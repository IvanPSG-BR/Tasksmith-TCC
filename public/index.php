<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Router;

// Verifica se o acesso está vindo do index.php da raiz
if (!defined('FROM_ROOT')) {
    header('Location: /');
    exit;
}

function front_controller(string $url) {
    $paths = Router::web_routes();
    if (isset($paths[$url])) {
        // Apresentar página (view) correspondente à URL
        require_once $paths[$url];
    } else {
        // Tratar página não encontrada (404)
        header("HTTP/1.0 404 Not Found");
        echo "404 Página Não Encontrada";
    }
}

$url = "/" . $_GET['url'];
front_controller($url);