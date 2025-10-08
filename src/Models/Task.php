<?php

namespace App\Models;

use RedBeanPHP\R as R;

class Task extends \RedBeanPHP\SimpleModel {

    // TODO: Mover esta lógica para um Service de Gamificação no futuro.
    private function calculateRewards(int $difficulty): array {
        return match ($difficulty) {
            1 => ['xp' => 10, 'gold' => 5],
            2 => ['xp' => 15, 'gold' => 15],
            3 => ['xp' => 25, 'gold' => 30],
            default => ['xp' => 0, 'gold' => 0],
        };
    }

    public function create(array $data): ?\RedBeanPHP\OODBBean {
        $task = R::dispense('tasks');
        $task->user_id = $data['user_id'];
        $task->created_at = date('Y-m-d H:i:s');
        $task->task_name = $data['task_name'];
        $task->task_description = $data['task_description'];
        $task->task_difficulty = $data['task_difficulty'];
        $task->timeout = $data['timeout'];
        $task->task_status = 'to_do';

        $rewards = $this->calculateRewards($task->task_difficulty);
        $task->xp_reward = $rewards['xp'];
        $task->gold_reward = $rewards['gold'];

        R::store($task);
        return $task;
    }

    public function updateTask(int $id, array $data): ?\RedBeanPHP\OODBBean {
        $task = R::load('tasks', $id);
        if (!$task->id) {
            return null;
        }

        $task->task_name = $data['task_name'] ?? $task->task_name;
        $task->task_description = $data['task_description'] ?? $task->task_description;
        $task->task_difficulty = $data['task_difficulty'] ?? $task->task_difficulty;
        $task->timeout = $data['timeout'] ?? $task->timeout;

        R::store($task);
        return $task;
    }

    public function updateStatus(int $id, string $status): ?\RedBeanPHP\OODBBean {
        $task = R::load('tasks', $id);
        if (!$task->id) {
            return null;
        }

        $valid_statuses = ['to_do', 'in_progress', 'finished'];
        if (!in_array($status, $valid_statuses)) {
            // Or throw an exception
            return null;
        }

        $task->task_status = $status;
        R::store($task);
        return $task;
    }

    public function deleteTask(int $id): bool {
        $task = R::load('tasks', $id);
        if (!$task->id) {
            return false;
        }
        R::trash($task);
        return true;
    }

    public function findById(int $id): ?\RedBeanPHP\OODBBean {
        return R::findOne('tasks', 'id = ?', [$id]);
    }

    public function findFromUser(int $user_id): array {
        return R::findAll('tasks', 'user_id = ?', [$user_id]);
    }
}