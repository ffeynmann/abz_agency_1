<?php

namespace App\Exceptions\Api\V1;

use Exception;
use Throwable;

class UserNotFound extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        response([
            'success' => false,
            'message' => 'The user with the requested identifier does not exist',
            "fails"   => [
                "user_id" => [
                    "User not found"
                ]

            ]

        ], 404)->send();
    }

}
