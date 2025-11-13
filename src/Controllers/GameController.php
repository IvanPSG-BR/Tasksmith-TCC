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
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $taskId = filter_var($data['taskId'] ?? null);
        $taskName = filter_var($data['taskName'] ?? null);
        $taskDescription = filter_var($data['taskDescription'] ?? null);

        if (!$taskId) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'ID da tarefa é obrigatório.']);
            return;
        }

        try {
            $taskModel = new Task();
            $existing_task = $taskModel->findById($taskId);

            if (!$existing_task || (int)$existing_task->user_id !== $_SESSION["user_id"]) {
                http_response_code(403);
                echo json_encode(['success' => false, 'error' => 'Acesso negado.']);
                return;
            }

            $task_data = [
                'task_name' => $taskName,
                'task_description' => $taskDescription,
            ];
            
            $task_data = array_filter($task_data, fn($value) => $value !== null);

            if ($taskModel->updateTask($taskId, $task_data)) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => 'Erro ao atualizar a tarefa.']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Erro interno do servidor.']);
        }
    }

    public function taskdelete_process() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $taskId = filter_var($data['taskId'] ?? null, FILTER_VALIDATE_INT);

        if (!$taskId) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'ID da tarefa é obrigatório.']);
            return;
        }

        try {
            $taskModel = new Task();
            $existing_task = $taskModel->findById($taskId);

            if (!$existing_task || (int)$existing_task->user_id !== $_SESSION['user_id']) {
                http_response_code(403);
                echo json_encode(['success' => false, 'error' => 'Acesso negado.']);
                return;
            }

            if ($taskModel->deleteTask($taskId)) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => 'Erro ao excluir a tarefa.']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Erro interno do servidor.']);
        }
    }

    public function task_status_process() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        
        $taskId = filter_var($data['taskId'] ?? null, FILTER_VALIDATE_INT);
        $newStatus = filter_var($data['newStatus'] ?? null);

        $valid_statuses = ['to_do', 'in_progress', 'finished'];
        if (!$taskId || !$newStatus || !in_array($newStatus, $valid_statuses)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Parâmetros inválidos.']);
            return;
        }

        try {
            $taskModel = new Task();
            $task = $taskModel->findById($taskId);

            if (!$task || (int)$task->user_id !== $_SESSION['user_id']) {
                http_response_code(403);
                echo json_encode(['success' => false, 'error' => 'Acesso negado.']);
                return;
            }

            // Verifica se a tarefa já estava finalizada para evitar aplicar recompensas duplicadas
            $wasAlreadyFinished = ($task->task_status === 'finished');

            $taskModel->updateStatus($taskId, $newStatus);

            $response = ['success' => true];

            // Aplica recompensas apenas se a tarefa não estava finalizada antes
            if ($newStatus === 'finished' && !$wasAlreadyFinished) {
                $rewardResult = GameService::applyTaskRewards($taskId, $_SESSION['user_id']);
                if ($rewardResult['success']) {
                    $response['character'] = [
                        'level' => $rewardResult['character']->level,
                        'xp' => $rewardResult['character']->xp,
                        'hp' => $rewardResult['character']->hp,
                        'gold_amount' => $rewardResult['character']->gold_amount
                    ];
                    $response['rewards'] = $rewardResult['rewards'];
                } else {
                    error_log("Erro ao aplicar recompensas para tarefa {$taskId}: " . $rewardResult['error']);
                    $response['warning'] = 'Tarefa atualizada, mas houve problema ao aplicar recompensas';
                }
            } else {
                // Se não aplicou recompensas, ainda retorna dados atuais do personagem
                $characterModel = new \App\Models\Character();
                $updatedCharacter = $characterModel->findByUserId($_SESSION['user_id']);
                if ($updatedCharacter) {
                    $response['character'] = [
                        'level' => $updatedCharacter->level,
                        'xp' => $updatedCharacter->xp,
                        'hp' => $updatedCharacter->hp,
                        'gold_amount' => $updatedCharacter->gold_amount
                    ];
                }
            }

            echo json_encode($response);

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'error' => 'Erro interno do servidor.']);
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