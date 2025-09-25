<?php

namespace App\Models;

use RedBeanPHP\R as R;

class User extends \RedBeanPHP\SimpleModel {

    public function create(string $username, string $password): ?\RedBeanPHP\OODBBean {
        if (R::findOne('users', 'username = ?', [$username])) {
            return null; // Falha: Usuário já existe
        }

        $user = R::dispense('users');
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        
        R::store($user);
        return $user;
    }

    public function findByUsername(string $username): ?\RedBeanPHP\OODBBean {
        return R::findOne('users', 'username = ?', [$username]);
    }

    public function verifyPassword(\RedBeanPHP\OODBBean $user, string $password): bool {
        return password_verify($password, $user->password);
    }
}