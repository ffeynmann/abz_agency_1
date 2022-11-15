<?php

use App\Exceptions\PhotoNotFound;
use App\Http\Controllers\Api\V1\PhotoGetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('images/users/{photo:name}', PhotoGetController::class)->missing(function(){
    throw new PhotoNotFound();
})->name('web.images.users');

Route::view('{page}', 'spa')->where('page', '.*');
