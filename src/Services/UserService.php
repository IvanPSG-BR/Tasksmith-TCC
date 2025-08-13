<?php

namespace App\Services;
use App\Models\User;

class UserService{
    public static function register_user(User $user, array $auth_data){
        return $user->save($auth_data);
    }

    public static function update_user(User $user, array $auth_data){
        return $user->update($_SESSION['user_id'], $auth_data);
    }
}