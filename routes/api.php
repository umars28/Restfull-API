<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;


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

Route::group([], function () {
    Route::post('/register', RegisterController::class);
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/create/article', [ArticleController::class, 'store']);
    Route::patch('/update/article/{article:slug}', [ArticleController::class, 'update']);
    Route::delete('/delete/article/{article:slug}', [ArticleController::class, 'destroy']);
});

Route::get('article/{article:slug}', [ArticleController::class, 'show']);
Route::get('articles', [ArticleController::class, 'index']);

Route::get('/user', UserController::class);

