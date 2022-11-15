<?php

namespace App\Exceptions\Api\V1;

use Exception;
use Throwable;

class UserBadRequest extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        response([
            'success' => false,
            'message' => 'Validation failed',
            "fails"   => [
                "user_id" => [
                    "The user_id must be an integer."
                ]

            ]

        ], 400)->send();
    }

}
