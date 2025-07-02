<?php

require_once __DIR__ . "/conn.php";

try{
    $conn->exec(
        "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,       
            username VARCHAR(18) NOT NULL UNIQUE,
            password VARCHAR(24) NOT NULL
        );
        
        CREATE TABLE IF NOT EXISTS characters (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       
            character_name VARCHAR(15) NOT NULL,
            hp INTEGER DEFAULT 3 CHECK (hp >= 0 AND hp <= 3),
            gold_amount INTEGER DEFAULT 0 CHECK (gold_amount <= 100),
            xp INTEGER DEFAULT 0,
            level INTEGER DEFAULT 1 CHECK (level >= 1 AND level <= 3),
            FOREIGN KEY (user_id) REFERENCES users(id)
        );
        
        CREATE TABLE IF NOT EXISTS tasks (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       
            task_name VARCHAR(50) NOT NULL,
            task_description VARCHAR(255),
            task_difficulty INTEGER CHECK (task_difficulty >= 1 AND task_difficulty <= 3),
            xp_reward INTEGER NOT NULL,
            gold_reward INTEGER NOT NULL,
            timeout TIMESTAMP NOT NULL,
            finished BOOLEAN DEFAULT FALSE,
            FOREIGN KEY (user_id) REFERENCES users(id)
        );"
    );
} catch (PDOException $e) {
    echo "Erro ao inicializar banco de dados: " . $e->getMessage() . "\n";
}
