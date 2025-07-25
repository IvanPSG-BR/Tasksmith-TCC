<?php

namespace App\Controllers;

class GameController {
    public function taskboard_page() {
        include_once __DIR__ . "/../Views/game/task-board.php";
    }

    public function taskforge_page() {
        include_once __DIR__ . "/../Views/game/task-forge.php";
    }
}