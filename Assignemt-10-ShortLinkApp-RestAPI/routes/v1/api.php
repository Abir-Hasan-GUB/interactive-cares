<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login'])
    ->middleware('guest')->name('login');

Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')->name('logout');

Route::post('register', [AuthController::class, 'register'])
    ->middleware('guest')->name('register');

Route::post('create-url', [UrlController::class, 'create_url'])
    ->middleware('auth:sanctum')->name('create_url');

Route::get('all-urls', [UrlController::class, 'all_urls'])
    ->middleware('auth:sanctum')->name('all_urls');
