<?php

class ValidationException extends AppException {

    public function __construct($errors = [],
        $message = 'Erro de validação',
        $code = 0,
        $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function get($att) {
        return $this->errors[$att];
    }
}