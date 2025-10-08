<?php

namespace App\Controllers;

use App\Models\Task;
use App\Services\GameService;
use Exception;

class GameController {

    public function taskboard_page() {
        include_once __DIR__ . "/../Views/game/task-board.php";
    }

    public function taskforge_page() {
        include_once __DIR__ . "/../Views/game/task-forge.php";
    }

    public function taskedit_process() {
        $task_id = filter_input(INPUT_POST, "task_id", FILTER_VALIDATE_INT);
        if (!$task_id) {
            header("HTTP/1.1 400 Bad Request");
            exit;
        }

        try {
            $taskModel = new Task();
            $existing_task = $taskModel->findById($task_id);

            if (!$existing_task || $existing_task->user_id !== $_SESSION["user_id"]) {
                header("HTTP/1.1 403 Forbidden");
                exit;
            }

            $task_data = [
                'task_name' => filter_input(INPUT_POST, "task_name"),
                'task_description' => filter_input(INPUT_POST, "task_description"),
                'task_difficulty' => filter_input(INPUT_POST, "task_difficulty", FILTER_VALIDATE_INT),
                'timeout' => filter_input(INPUT_POST, "task_timeout"),
            ];
            
            // Remove chaves nulas para não sobrescrever com nada
            $task_data = array_filter($task_data, function($value) {
                return $value !== null && $value !== '';
            });

            $taskModel->updateTask($task_id, $task_data);
            header("Location: /game/task-board");
            exit;
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }

    public function taskdelete_process() {
        header('Content-Type: application/json');
        parse_str(file_get_contents("php://input"), $data);
        $task_id = filter_var($data['task_id'] ?? null, FILTER_VALIDATE_INT);

        if (!$task_id) {
            http_response_code(400);
            echo json_encode(['error' => 'ID da tarefa é obrigatório.']);
            return;
        }

        try {
            $taskModel = new Task();
            $existing_task = $taskModel->findById($task_id);

            if (!$existing_task || $existing_task->user_id !== $_SESSION['user_id']) {
                http_response_code(403);
                echo json_encode(['error' => 'Acesso negado.']);
                return;
            }

            if ($taskModel->deleteTask($task_id)) {
                http_response_code(200);
                echo json_encode(['success' => 'Tarefa excluída.']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Erro ao excluir a tarefa.']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro interno do servidor.']);
        }
    }

    public function taskcomplete_process() {
        header('Content-Type: application/json');
        parse_str(file_get_contents("php://input"), $data);
        
        $task_id = filter_var($data['task_id'] ?? null, FILTER_VALIDATE_INT);
        $is_finished = filter_var($data['is_finished'] ?? null, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        if (!$task_id || $is_finished === null) {
            http_response_code(400);
            echo json_encode(['error' => 'Parâmetros inválidos.']);
            return;
        }

        try {
            $gameService = new GameService();
            $gameService->completeTask($task_id, $_SESSION['user_id']);
            
            http_response_code(200);
            echo json_encode(['success' => 'Status da tarefa atualizado e recompensas aplicadas.']);

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro interno do servidor.']);
        }
    }

    public function taskcreation_process() {
        try {
            $task_data = [
                'user_id' => $_SESSION['user_id'],
                'task_name' => filter_input(INPUT_POST, "task_name"),
                'task_description' => filter_input(INPUT_POST, "task_description"),
                'task_difficulty' => filter_input(INPUT_POST, "task_difficulty", FILTER_VALIDATE_INT),
                'timeout' => filter_input(INPUT_POST, "task_timeout"),
            ];

            // TODO: Adicionar validação dos dados de entrada

            $taskModel = new Task();
            $taskModel->create($task_data);
            
            header("Location: /game/task-forge");
            exit;
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }
}