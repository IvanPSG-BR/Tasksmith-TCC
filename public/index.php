<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Router;

// Verifica se o acesso está vindo do index.php da raiz
if (!defined('FROM_ROOT')) {
    echo "Você não deveria estar aqui >:(";
    echo "<a href=\"/\">Voltar para página inicial</a>";
}

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);

if (isset(Router::web_routes()[$path])) {
    // Apresentar página (view) correspondente à URL
    require_once Router::web_routes()[$path];
} else {
    // Tratar página não encontrada (404)
    header("HTTP/1.0 404 Not Found");
    echo "404 Página Não Encontrada";
}