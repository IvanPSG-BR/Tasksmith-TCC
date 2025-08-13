<?php

namespace App\Controllers;
use App\Services\UserService;

class AuthController {
    public function signup_page() {
        include_once __DIR__ . "/../Views/auth/signup.php";
    }

    public function signup_process() {
        $auth_data = [
            "username" => filter_input(INPUT_POST, "username"),
            "password"=> filter_input(INPUT_POST, "password")
        ];


    }

    public function login_page() {
        include_once __DIR__ . "/../Views/auth/login.php";
    }

    public function login_process() {
        $auth_data = [
            "username" => filter_input(INPUT_POST, "username"),
            "password"=> filter_input(INPUT_POST, "password")
        ];


    }
}