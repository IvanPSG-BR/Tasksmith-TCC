<?php

namespace App\Exceptions;

class AuthorizationException extends \Exception {
    public function __construct($message = "Acesso não autorizado", $code = 403, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}