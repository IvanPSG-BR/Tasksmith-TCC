<?php

namespace App\Models;
use App\Db\QueryBuilder;

class User {
    private $username;
    private $password;

    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
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

    public static function find_by_username(string $username) {
        return QueryBuilder::db_select(values: ["*"], condition: "username = ?", condition_values: [$username]);
    }

    public static function all(string $field = null, string $cond_value = null) {
        $allowed_fields = ['id', 'username']; 

        if (isset($field) && in_array($field, $allowed_fields)) {
            return QueryBuilder::db_select(values: ["*"], condition: "$field = ?", condition_values: [$cond_value]);
        }
        return QueryBuilder::db_select(values: ["*"]);
    }

    public function save() {
        if (!QueryBuilder::db_select(values: ["*"], condition: "username = ?", condition_values: [$this->username])) {
            return QueryBuilder::db_insert(["username", "password"], [$this->username, $this->password]);
        } else {
            return QueryBuilder::db_update(["username", "password"], [$this->username, $this->password], "username = ?", [$this->username]);
        }
    }

    public function delete($id) {
        return QueryBuilder::db_delete("id = ?", [$id]);
    }
}