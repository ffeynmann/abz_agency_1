<?php
namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Api\V1\Positions\PositionsIndex;
use App\Http\Controllers\Api\V1\Users\UserCreate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function(){
    Route::get('token', TokenCreateController::class);

    Route::post('users', UserCreate::class)->middleware(['token-verified']);

    Route::get('user/{user}', Users\UserShow::class)->name('api.v1.user.show');
    Route::get('users', Users\UsersIndex::class)->name('api.v1.users.index');

    Route::get('positions', PositionsIndex::class);
});

