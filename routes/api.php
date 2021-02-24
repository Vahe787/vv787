<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;

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

Route::get('users/{user}', [UserController::class, 'getUser']);

Route::post('login', [UserController::class, 'apiLogin']);

Route::get('user', function(){
	dd(\Auth::user());
})->middleware('auth:api');