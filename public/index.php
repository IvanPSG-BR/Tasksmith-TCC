<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Router;

// Verifica se o acesso está vindo do index.php da raiz
if (!defined('FROM_ROOT')) {
    header('Location: /');
    exit;
}

function front_controller(string $url, string $http_method) {
    $paths = Router::web_routes();
    if (isset($paths[$url])) {
        $controller = explode("@", $paths[$url])[0];
        $action = explode("@", $paths[$url])[1];

        $current_controller = new ("App\\Controllers\\" . $controller);

        switch ($http_method) {
            case "GET":
                Router::get($url, $paths[$url]);
                $current_controller->$action();

            case "POST":
                Router::post($url, $paths[$url]);

            case "PUT":
                Router::put($url, $paths[$url]);

            case "DELETE":
                Router::delete($url, $paths[$url]);
        }

    } else {
        // Tratar página não encontrada (404)
        header("HTTP/1.0 404 Not Found");
        echo "404 Página Não Encontrada";
    }
}

$url = "/" . $_GET['url'];
front_controller($url, $_SERVER['REQUEST_METHOD']);