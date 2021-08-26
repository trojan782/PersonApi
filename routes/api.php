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
//Route::post('/register', 'App\Http\Controllers\Auth\AuthController@register');
//Route::post('/login', 'App\Http\Controllers\Auth\AuthController@login');
//Route::get('/people', 'App\Http\Controllers\v1\Api\PersonController@index');
//Route::group(["middleware" => "auth:api"], function() {
//    Route::apiResource('/people', App\Http\Controllers\v1\Api\PersonController::class);
//});

Route::post('/login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
Route::post('/register', 'App\Http\Controllers\Auth\AuthController@register')->name('register');

//Route::post('/register', 'App\Http\Controllers\Auth\AuthController@register')->name('register');
 Route::apiResource('/people', App\Http\Controllers\v1\Api\PersonController::class);
// Route::apiResource('/auth', App\Http\Controllers\Auth\AuthController::class);


// Route::group(["middleware" => "auth.jwt"], function () {
//     Route::get("logout", "AuthController@logout");
//     Route::resource("tasks", "TaskController");
// });

//Route::group([
//    'middleware' => 'api',
////    'prefix' => 'auth'
//
//], function ($router) {
//    Route::post('/login', 'App\Http\Controllers\Auth\AuthController@login');
//    Route::post('/register', 'App\Http\Controllers\Auth\AuthController@register');
//    Route::post('/logout', 'App\Http\Controllers\Auth\AuthController@logout');
//    Route::post('/refresh', 'App\Http\Controllers\Auth\AuthController@refresh');
//    Route::get('/person', 'App\Http\Contollers\v1\Api\PersonController@show');
//});



