<?php

namespace App\Models;
use App\Db\QueryBuilder;

class User {
    private $username;
    private $password;

    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function get_username() {
        return $this->username;
    }

    public function set_username(string $username) {
        return $this->username = $username;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_password(string $password) {
        return $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public static function find(int $id) {
        return QueryBuilder::db_select(values: ["*"], condition: "id = ?", condition_values: [$id]);
    }
    

    public static function find_by_username(string $username) {
        return QueryBuilder::db_select(values: ["*"], condition: "username = ?", condition_values: [$username]);
    }

    public static function all() {
        return QueryBuilder::db_select(values: ["*"]);
    }

    public static function save(array $data) {
        // 1. Verifica se o usuário já existe para evitar duplicatas
        if (self::find_by_username($data['username'])) {
            return false; // Falha: Usuário já existe
        }

        // 2. Criptografa a senha para armazenamento seguro
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

        // 3. Insere o novo usuário no banco de dados
        return QueryBuilder::db_insert(
            ["username", "password"],
            [$data['username'], $hashed_password]
        );
    }

    public static function update(int $id, array $data) {
        // Criptografa a nova senha, se fornecida
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

        return QueryBuilder::db_update(
            ["username", "password"],
            [$data['username'], $hashed_password],
            "id = ?",
            [$id]
        );
    }

    public static function delete($id) {
        return QueryBuilder::db_delete("id = ?", [$id]);
    }
}