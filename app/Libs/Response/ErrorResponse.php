<?php

namespace App\Libs\Response;

class ErrorResponse
{
    public static function error (string $error) : string
    {
        return json_encode([
            'status' => 'error',
            'error' => $error,
        ]);
    }
}
