CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,       
    username VARCHAR(18) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS characters (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       
    character_name VARCHAR(15) NOT NULL,
    hp INT DEFAULT 3 CHECK (hp >= 0 AND hp <= 3),
    gold_amount INT DEFAULT 0 CHECK (gold_amount <= 100),
    xp INT DEFAULT 0,
    `level` INT DEFAULT 1 CHECK (`level` >= 1 AND `level` <= 3),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,       
    task_name VARCHAR(50) NOT NULL,
    task_description VARCHAR(255),
    task_difficulty INT CHECK (task_difficulty >= 1 AND task_difficulty <= 3),
    xp_reward INT NOT NULL,
    gold_reward INT NOT NULL,
    `timeout` VARCHAR(10) NOT NULL,
    task_status ENUM('to_do', 'in_progress', 'finished') NOT NULL DEFAULT 'to_do',
    FOREIGN KEY (user_id) REFERENCES users(id)
);