<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersIndexRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UsersPaginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class UsersIndex extends Controller
{
    public int $perPage = 5;

    public function __invoke(UsersIndexRequest $request)
    {
        $validated = $request->validated();

        $usersPaginator = new UsersPaginator(
            $validated['page'] ?? null,
            $validated['offset'] ?? null,
            $validated['count'] ?? null,
        );

        return $usersPaginator->getData();
    }
}
