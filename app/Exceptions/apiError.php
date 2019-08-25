<?php

namespace App\Exceptions;

class apiError{
    public static function errorMessage($message, $code) {
        return [
            'message' => $message,
            'code' => $code
        ];
    }
}
