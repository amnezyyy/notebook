<?php

namespace App\Libs\Response;

class SuccessResponse
{
    public static function success ($success) : string
    {
        return response()
            ->json(
            [
                'status' => 'success',
                'data' => $success,
            ], 200);
    }
}
