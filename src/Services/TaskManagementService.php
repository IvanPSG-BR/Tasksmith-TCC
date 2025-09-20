<?php

namespace App\Services;
use App\Models\Task;

class TaskManagementService {
    public static function create_task(Task $task) {
        return Task::save($task->to_array());
    }

    public static function get_taskbyid(int $task_id) {
        return Task::findtask($task_id);
    }

    public static function get_alltasks(int $user_id = null) {
        if ($user_id) {
            return Task::find_from($user_id);
        }
        return Task::all();
    }

    public static function edit_task(int $task_id, Task $task) {
        return Task::update($task_id, $task->to_array());
    }

    public static function complete_task(int $task_id, bool $is_finished) {
        return Task::complete($task_id, $is_finished);
    }

    public static function delete_task(int $id) {
        return Task::delete($id);
    }
}