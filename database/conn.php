<?php

$dsn = "sqlite:" . __DIR__ . "/tasksmith.db";
$db_user = "root";
$db_password = "";

try{
    $conn = new PDO($dsn, $db_user, $db_password);
} catch (Throwable $e) {
    echo "Erro ao conectar com banco de dados: " . $e->getMessage() . "\n";
}
