<?php

$sgbd = $_ENV["DB_SGBD"];
$db_host = $_ENV["DB_HOST"];
$db_name = $_ENV["DB_NAME"];
$db_user = $_ENV["DB_USER"];
$db_password = $_ENV["DB_PASS"];

$dsn = $sgbd . ":host=" . $db_host . ";dbname=" . $db_name . ";port=3306";

try{
    $conn = new PDO($dsn, $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar com banco de dados: " . $e->getMessage() . "\n";
}
