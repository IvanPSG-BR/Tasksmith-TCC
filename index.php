<?php

require_once __DIR__ . "/../config/settings.php";
require_once ROOT_PATH . 'src/Database/conn.php';

use App\Routes;
use App\Exceptions\AuthenticationException;
use App\Exceptions\AuthorizationException;
use App\Exceptions\ValidationException;

session_start();

function is_logged(): bool {
    return isset($_SESSION['user_id']);
}

function front_controller(string $url, string $http_method) {
    try {
        $paths = Routes::web_routes();
        $protected_routes = ['/game', '/game/task-board', '/game/task-forge'];
        
        if (isset($paths[$url])) {

            if (!isset($paths[$url][$http_method])) {
                header("HTTP/1.1 405 Method Not Allowed");
                echo "405 Método Não Permitido";
                exit;
            }
            $controller_data = explode("@", $paths[$url][$http_method]);

            if (in_array($url, $protected_routes) && !is_logged()) {
                header('Location: /login');
                exit;
            }

            $controller = $controller_data[0];
            $action = $controller_data[1];

            $current_controller = new ("App\\Controllers\\" . $controller);
            $current_controller->$action();
        } else {
            // Tratar página não encontrada (404)
            header("HTTP/1.1 404 Not Found");
            echo "404 Página Não Encontrada";
            exit;
        }
    } catch (ValidationException $e) {
        http_response_code($e->getCode());
        echo json_encode(['error' => $e->getMessage()]);
    } catch (AuthenticationException $e) {
        http_response_code($e->getCode());
        echo json_encode(['error' => $e->getMessage()]);
    } catch (AuthorizationException $e) {
        http_response_code($e->getCode());
        echo json_encode(['error' => $e->getMessage()]);
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erro interno do servidor: ' . $e->getMessage()]);
    }
}

$url = "/";
$url .= $_GET['url'] ?? '';
front_controller($url, $_SERVER['REQUEST_METHOD']);