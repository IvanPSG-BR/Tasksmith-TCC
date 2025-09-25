<?php

namespace App\Exceptions;

class ValidationException extends \Exception {
    public function __construct($message = "Erro de validação", $code = 400, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}