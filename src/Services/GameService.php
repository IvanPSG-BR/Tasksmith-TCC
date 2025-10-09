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

    public static function completeTask(int $taskId, int $userId) {
        $taskModel = new Task();
        $task = $taskModel->findById($taskId);

        if (!$task || $task->user_id !== $userId) {
            // Lançar exceção de autorização
            return;
        }

        // Marcar a tarefa como concluída
        $taskModel->updateStatus($taskId, "finished");

        // Aplicar recompensas
        $character = new Character();

        if ($character->findByUserId($userId)) {
            $character->addXp($task->xp_reward);
            $character->addGold($task->gold_reward);
        }
    }

    public static function createCharacter(int $userId, string $characterName) {
        Character::create($userId, $characterName);
    }
}
