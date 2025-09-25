<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use RedBeanPHP\R as R;

$sgbd = $_ENV["DB_SGBD"];
$db_host = $_ENV["DB_HOST"];
$db_name = $_ENV["DB_NAME"];
$db_user = $_ENV["DB_USER"];
$db_password = $_ENV["DB_PASS"];

$dsn = $sgbd . ":host=" . $db_host . ";dbname=" . $db_name . ";port=3306";

try {
    R::setup($dsn, $db_user, $db_password);
    
    if (!R::testConnection()) {
        throw new Exception("Não foi possível conectar ao banco de dados.");
    }

} catch (Exception $e) {
    echo "Erro ao conectar com banco de dados: " . $e->getMessage() . "\n";
    exit;
}
