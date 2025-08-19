<?php

namespace App\Controllers;
use App\Services\UserService;
use App\Models\User;

class AuthController {
    private static function new_user() {
        $auth_data = [
            "username" => filter_input(INPUT_POST, "username"),
            "password"=> filter_input(INPUT_POST, "password")
        ];

        return new User($auth_data["username"], $auth_data['password']);
    }

    public function signup_page() {
        include_once __DIR__ . "/../Views/auth/signup.php";
    }

    public function signup_process() {
        $user = self::new_user();
        
        $register = UserService::register_user($user);
        if ($register) {
            header("Location: /game/task-board");
            exit;
        } else {
            $_SESSION['flash_message'] = "Este nome de usuário já está em uso.";
            header("Location: /signup");
            exit;
        }
    }

    public function removeaccount_process() {
        $remove_account = UserService::delete_user();

        if ($remove_account) {
            header("Location: /");
            exit;
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }

    public function login_page() {
        include_once __DIR__ . "/../Views/auth/login.php";
    }

    public function login_process() {
        $user = self::new_user();

        $login = UserService::login($user);
        if ($login) {
            header("Location: /game/task-board");
            exit;
        } else {
            $_SESSION['flash_message'] = "Usuário ou senha inválidos.";
            header("Location: /login");
            exit;
        }
    }

    public function logout_process() {
        $logout = UserService::logout();

        if ($logout) {
            header("Location: /");
            exit;
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }
}