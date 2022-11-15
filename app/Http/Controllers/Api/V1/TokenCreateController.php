<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TokenForUserRegistration;
use Illuminate\Http\Request;

class TokenCreateController extends Controller
{
    public function __invoke()
    {
        $token = new TokenForUserRegistration();
        $token->save();

        return [
            'success' => true,
            'token'   => $token->token
        ];
    }
}
