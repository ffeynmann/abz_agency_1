<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;

use App\Models\User;
use App\Services\HandleUploadFile;
use Illuminate\Support\Facades\DB;

class UserCreate extends Controller
{
    public function __invoke(UserCreateRequest $request)
    {
        $user = new User();

        DB::transaction(function() use ($request, &$user){
            //after model photo created, optimize image job will added to queue
            $photo = HandleUploadFile::getPhoto();

            $user = $user->fill($request->validated());
            $user->save();

            $user->photo()->save($photo);
        });

        return [
            'success' => 'true',
            'user_id' => $user->id,
            'message' => 'New user successfully registered'
        ];
    }
}
