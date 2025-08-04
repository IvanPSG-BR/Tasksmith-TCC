<?php

namespace App\Controllers;

class AuthController {
    public function signup_page() {
        include_once __DIR__ . "/../Views/auth/signup.php";
    }

    public function signup_process() {
        include_once __DIR__ . "/../Services/UserService.php";
    }

    public function login_page() {
        include_once __DIR__ . "/../Views/auth/login.php";
    }

    public function login_process() {
        include_once __DIR__ . "/../Services/UserService.php";
    }
}