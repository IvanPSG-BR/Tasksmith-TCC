<?php

namespace App\Models;

class User {
    private $id;
    private $username;
    private $password;
    private $exists = false;

    public function __construct(int $id, string $username, string $password, bool $exists) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->exists = $exists;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_username() {
        return $this->username;
    }

    public function get_password() {
        return $this->password;
    }

    public function get_exists() {
        return $this->exists;
    }

    
}