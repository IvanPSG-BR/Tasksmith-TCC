<?php

$dsn = "sqlite:" . __DIR__ . "/tasksmith.db";
$user = "root";
$password = "";

try{
    $conn = new PDO($dsn, $user, $password);
} catch (Throwable $e) {
    echo "Erro ao conectar com banco de dados: " . $e->getMessage() . "\n";
}
