<?php

namespace App\Services;
use App\Models\User;

class UserService{
    private static function auth_data(User $user): array {
        return [
            "username" => $user->get_username(),
            "password" => $user->get_password()
        ];
    }

    public static function register_user(User $user): bool|string{
        return $user::save(self::auth_data($user));
    }

    public static function update_user(User $user): bool{
        return $user::update($_SESSION['user_id'], self::auth_data($user));
    }

    public static function delete_user(): bool {
        return User::delete($_SESSION['user_id']);
    }

    public static function login(User $user): bool{
        $current_user = User::find_by_username( self::auth_data($user)['username'] );

        if ($current_user) {
            $user_id = $current_user["id"];

            if (password_verify($user->get_password(), User::find($user_id)['password'])) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = User::find($user_id);

                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public static function logout(): bool {
        session_unset();
        return session_destroy();
    }

    public static function is_logged(): bool {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}