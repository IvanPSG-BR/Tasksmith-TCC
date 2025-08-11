<?php

require_once __DIR__ . "/../config/settings.php";
require_once ROOT_PATH . 'database/conn.php';
use App\Routes;

// Verifica se o acesso está vindo do index.php da raiz
if (!defined('FROM_ROOT')) {
    header('Location: /');
    exit;
}

function front_controller(string $url, string $http_method) {
    $paths = Routes::web_routes();
    
    if (isset($paths[$url])) {

        if (!isset($paths[$url][$http_method])) {
            header("HTTP/1.1 405 Method Not Allowed");
            echo "405 Método Não Permitido";
            exit;
        }
        $controller_data = explode("@", $paths[$url][$http_method]);

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
}

$url = "/";
$url .= $_GET['url'] ?? '';
front_controller($url, $_SERVER['REQUEST_METHOD']);