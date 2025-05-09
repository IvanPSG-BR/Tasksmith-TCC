<?php

/**
 * Arquivo index.php na raiz do projeto
 * 
 * Este arquivo serve como um redirecionador para o verdadeiro ponto de entrada
 * da aplicação que está em public/index.php
 */

// Define a constante para indicar que estamos acessando a partir da raiz
define('FROM_ROOT', true);

// Inclui o arquivo index.php da pasta public
try {
    require_once __DIR__ . '/public/index.php';
} catch (Throwable $e) {
    echo "Erro: " . $e->getMessage();
}
