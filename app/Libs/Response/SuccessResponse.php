<?php

namespace App\Libs\Response;

class SuccessResponse
{
    public static function success (array $success) : string
    {
        return json_encode([
            'status' => 'success',
            'data' => $success,
        ]);
    }
}
