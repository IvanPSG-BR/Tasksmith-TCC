<?php

namespace App\Controllers;

use App\Models\User;
use RedBeanPHP\R as R;

class AuthController {

    public function signup_page() {
        include_once __DIR__ . "/../Views/auth/signup.php";
    }

    public function signup_process() {
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");

        $userModel = new User();
        $user = $userModel->create($username, $password);

        if ($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            header("Location: /game/task-board");
            exit;
        } else {
            $_SESSION['flash_message'] = "Este nome de usuário já está em uso.";
            header("Location: /signup");
            exit;
        }
    }

    public function removeaccount_process() {
        $user = R::load('users', $_SESSION['user_id']);
        R::trash($user);
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }

    public function login_page() {
        include_once __DIR__ . "/../Views/auth/login.php";
    }

    public function login_process() {
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");

        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if ($user && $userModel->verifyPassword($user, $password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            header("Location: /game/task-board");
            exit;
        } else {
            $_SESSION['flash_message'] = "Usuário ou senha inválidos.";
            header("Location: /login");
            exit;
        }
    }

    public function logout_process() {
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }
}