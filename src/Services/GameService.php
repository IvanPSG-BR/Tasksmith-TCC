<?php

namespace App\Services;

use App\Models\Character;
use App\Models\Task;

class GameService {

    public function completeTask(int $taskId, int $userId) {
        $taskModel = new Task();
        $task = $taskModel->findById($taskId);

        if (!$task || $task->user_id !== $userId) {
            // Lançar exceção de autorização
            return;
        }

        // Marcar a tarefa como concluída
        $taskModel->complete($taskId, true);

        // Aplicar recompensas
        $characterModel = new Character();
        $character = $characterModel->findByUserId($userId);

        if ($character) {
            $character->addXp($task->xp_reward);
            $character->addGold($task->gold_reward);
        }
    }
}
