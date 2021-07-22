<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::apiResource('/people', App\Http\Controllers\v1\Api\PersonController::class);
Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\Auth\AuthController@login');

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'App\Http\Controllers\Auth\AuthController');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
// });


// Route::group(["middleware" => "auth.jwt"], function () {
//     Route::get("logout", "AuthController@logout");
//     Route::resource("tasks", "TaskController");
// });
