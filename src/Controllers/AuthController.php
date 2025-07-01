<?php

namespace App\Controllers;

class AuthController {
    public function signup_index() {
        include_once __DIR__ . "/../Views/auth/signup.php";
    }

    public function login_index() {
        include_once __DIR__ . "/../Views/auth/login.php";
    }
}