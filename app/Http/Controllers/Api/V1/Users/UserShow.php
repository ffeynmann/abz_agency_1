<?php

namespace App\Http\Controllers\Api\V1\Users;


use App\Exceptions\Api\V1\UserBadRequest;
use App\Exceptions\Api\V1\UserNotFound;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserShow extends Controller
{
    public function __invoke(Request $request, $userId)
    {
        if(!is_numeric($userId)) {
            throw new UserBadRequest();
        }

        $user = User::find($userId);

        if(!$user) {
            throw new UserNotFound();
        }

        return [
            'success' => true,
            'user'    => UserResource::make($user)
        ];
    }
}
