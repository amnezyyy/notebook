<?php

namespace App\Libs\Response;

class ErrorResponse
{
    public static function error (array $error) : string
    {
        return json_encode([
            'status' => 'error',
            'error' => $error,
        ]);
    }
}
