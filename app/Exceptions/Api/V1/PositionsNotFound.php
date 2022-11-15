<?php

namespace App\Exceptions\Api\V1;

use Exception;
use Throwable;

class PositionsNotFound extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        response([
            'success' => false,
            'message' => 'Positions not found',
        ], 422)->send();
    }

}
