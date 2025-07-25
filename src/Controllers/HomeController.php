<?php

namespace App\Controllers;

class HomeController {
    public function page() {
        include_once __DIR__ . "/../Views/home/home.php";
    }
}
