<?php

namespace App\Libs\Response;

class ErrorResponse
{
    public static function error ($error) : string
    {
        return response()
            ->json([
            'status' => 'error',
            'error' => $error,
        ], 400);
    }
}
