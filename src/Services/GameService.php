<?php

namespace App\Services;

use App\Models\Character;
use App\Models\Task;

class GameService {
    public static function calculateRewards(int $difficulty): array {
        return match ($difficulty) {
            1 => ['xp' => 10, 'gold_amount' => 5],
            2 => ['xp' => 15, 'gold_amount' => 15],
            3 => ['xp' => 25, 'gold_amount' => 30],
            default => ['xp' => 0, 'gold_amount' => 0],
        };
    }

    public static function applyTaskRewards(int $taskId, int $userId): array {
        try {
            $taskModel = new Task();
            $task = $taskModel->findById($taskId);

            if (!$task || (int)$task->user_id !== $userId) {
                return ['success' => false, 'error' => 'Tarefa não encontrada ou acesso negado'];
            }

            // Buscar personagem
            $characterModel = new Character();
            $character = $characterModel->findByUserId($userId);

            if (!$character) {
                return ['success' => false, 'error' => 'Personagem não encontrado'];
            }

            // Aplicar recompensas de XP e ouro
            $character->xp += $task->xp_reward;
            $character->gold_amount += $task->gold_reward;

            // Lógica de Level Up
            $xp_needed = match ((int)$character->level) {
                1 => 100,
                2 => 150,
                default => 100 + ((int)$character->level - 1) * 50,
            };

            if ($character->xp >= $xp_needed) {
                $character->xp -= $xp_needed;
                $character->level += 1;
            }

            // Lógica de Ganho de Vida (aplicada ANTES de limitar o ouro)
            if ($character->hp < 3 && $character->gold_amount >= 100) {
                $character->hp += 1;
                $character->gold_amount -= 100;
            }

            // Limitar ouro máximo a 99 (apenas se não precisar comprar vida)
            if ($character->hp >= 3 && $character->gold_amount > 99) {
                $character->gold_amount = 99;
            }

            \RedBeanPHP\R::store($character);

            return [
                'success' => true,
                'character' => $character,
                'rewards' => [
                    'xp' => $task->xp_reward,
                    'gold' => $task->gold_reward
                ]
            ];

        } catch (\Exception $e) {
            error_log("Erro ao aplicar recompensas: " . $e->getMessage());
            return ['success' => false, 'error' => 'Erro interno ao aplicar recompensas'];
        }
    }

    // Manter método antigo para compatibilidade, mas marcar como deprecated
    public static function completeTask(int $taskId, int $userId) {
        $result = self::applyTaskRewards($taskId, $userId);
        return $result['success'];
    }

    public static function createCharacter(int $userId, string $characterName) {
        Character::create($userId, $characterName);
    }
}
