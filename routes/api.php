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

/* ====== Sign =======*/
Route::post('login', 'App\Http\Controllers\API\AuthController@login')->name('login');
Route::post('register', 'App\Http\Controllers\API\AuthController@register')->name('register');

Route::middleware('auth:sanctum')->group(function () {
    /*====== Posts =======*/
    Route::get('posts', 'App\Http\Controllers\API\PostsController');
});
