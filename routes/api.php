<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users', [UserController::class, 'apiStore']);

Route::post('login', [UserController::class, 'apiLogin']);

Route::group(['middleware' => ['auth:api']], function(){

	Route::get('users/{user}', [UserController::class, 'getUser']);

	Route::patch('posts/{post}/likes', [PostController::class, 'apiUpdateLikes']);

	Route::get('posts/{post}/likes', [PostController::class, 'apiGetLikes']);
});