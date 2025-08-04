<?php

// --- INÍCIO DA CONFIGURAÇÃO DE AMBIENTE MANUAL ---

$rootPath = dirname(__DIR__);
$envFilePath = $rootPath . '/.env';

if (file_exists($envFilePath)) {
    $lines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $value = trim(trim($value), '"\''); // Remove aspas e espaços
        $_ENV[trim($name)] = $value;
    }
} else {
    die("ERRO CRÍTICO: O arquivo .env não foi encontrado. O script não pode continuar.");
}

// --- FIM DA CONFIGURAÇÃO DE AMBIENTE MANUAL ---


// Agora que o ambiente está carregado, podemos chamar a conexão.
require_once __DIR__ . "/conn.php";

try{
    $conn->exec(
        "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,       
            username VARCHAR(18) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL
        );"
    );
    $conn->exec(
        "CREATE TABLE IF NOT EXISTS characters (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       
            character_name VARCHAR(15) NOT NULL,
            hp INT DEFAULT 3 CHECK (hp >= 0 AND hp <= 3),
            gold_amount INT DEFAULT 0 CHECK (gold_amount <= 100),
            xp INT DEFAULT 0,
            `level` INT DEFAULT 1 CHECK (`level` >= 1 AND `level` <= 3),
            FOREIGN KEY (user_id) REFERENCES users(id)
        );"
    );
    $conn->exec(
        "CREATE TABLE IF NOT EXISTS tasks (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       
            task_name VARCHAR(50) NOT NULL,
            task_description VARCHAR(255),
            task_difficulty INT CHECK (task_difficulty >= 1 AND task_difficulty <= 3),
            xp_reward INT NOT NULL,
            gold_reward INT NOT NULL,
            `timeout` TIMESTAMP NOT NULL,
            finished BOOLEAN NOT NULL DEFAULT FALSE,
            FOREIGN KEY (user_id) REFERENCES users(id)
        );"
    );

    $conn = null;
} catch (PDOException $e) {
    echo "Erro ao inicializar banco de dados: " . $e->getMessage() . "\n";
}
