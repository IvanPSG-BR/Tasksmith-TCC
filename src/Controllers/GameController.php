<?php

namespace App\Controllers;
use App\Models\Task;
use App\Services\TaskManagementService;
use Exception;

class GameController {
    private static function task_data() {
        $task_name = filter_input(INPUT_POST, "task_name");
        $task_description = filter_input(INPUT_POST, "task_description");
        $task_difficulty = filter_input(INPUT_POST, "task_difficulty");
        $task_timeout = filter_input(INPUT_POST, "task_timeout");

        return [
            "user_id" => $_SESSION['user_id'],
            "task_name" => $task_name,
            "task_description" => $task_description,
            "task_difficulty" => $task_difficulty,
            "task_timeout" => $task_timeout
        ];
    }

    private static function new_task($task) {
        return new Task($task);
    }

    public function taskboard_page() {
        include_once __DIR__ . "/../Views/game/task-board.php";
    }

    public function taskforge_page() {
        include_once __DIR__ . "/../Views/game/task-forge.php";
    }

    public function taskedit_process() {
        $task_id = filter_input(INPUT_POST, "task_id");

        try {
            $existing_task_data = TaskManagementService::get_taskbyid($task_id);
            if (!$existing_task_data || $existing_task_data[0]['user_id'] !== $_SESSION["user_id"]) {
                header("HTTP/1.1 500 Internal Server Error");
                exit;
            }

            $task_data_for_validation = [
                'user_id' => self::task_data()["user_id"],
                'task_name' => self::task_data()['task_name'] ?? $existing_task_data[0]['task_name'],
                'task_description' => self::task_data()['task_description'] ?? $existing_task_data[0]['task_description'],
                'task_difficulty' => self::task_data()['task_difficulty'] ?? $existing_task_data[0]['task_difficulty'],
                'task_timeout' => self::task_data()['task_timeout'] ?? $existing_task_data[0]['timeout'],
            ];
            $task_to_update = self::new_task($task_data_for_validation);

            TaskManagementService::edit_task($task_id, $task_to_update);
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }

    public function taskdelete_process() {
        header('Content-Type: application/json');
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['task_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID da tarefa é obrigatório para exclusão.']);
            return;
        }

        $task_id = (int) $data['task_id'];
        try {
            $existing_task_data = TaskManagementService::get_taskbyid($task_id);
            if (!$existing_task_data || $existing_task_data[0]['user_id'] !== $_SESSION['user_id']) {
                header("HTTP/1.1 500 Internal Server Error");
                exit;
            }

            TaskManagementService::delete_task($task_id);
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }

    public function taskcomplete_process() {
        header('Content-Type: application/json');
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['task_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID da tarefa é obrigatório para exclusão.']);
            return;
        }
        if (!isset($data['is_finished'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID da tarefa é obrigatório para exclusão.']);
            return;
        }

        $task_id = (int) $data['task_id'];
        // Converte 'true'/'false' ou '1'/'0' para booleano
        $is_finished = filter_var($data['is_finished'], FILTER_VALIDATE_BOOLEAN);
        $user_id = $_SESSION['user_id'];

        try {
            $existing_task_data = TaskManagementService::get_taskbyid($task_id);
            if (!$existing_task_data || $existing_task_data[0]['user_id'] !== $_SESSION['user_id']) {
                header("HTTP/1.1 500 Internal Server Error");
                exit;
            }

            TaskManagementService::complete_task($task_id, $is_finished);
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }

    public function taskcreation_process() {
        try {
            $task = self::new_task(self::task_data());
            TaskManagementService::create_task($task);
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }
}