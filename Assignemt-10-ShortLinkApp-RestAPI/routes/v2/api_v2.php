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

require base_path('routes/v1/api.php');

Route::get('all-urls', [UrlController::class, 'all_urls_with_visit_count'])
    ->middleware('auth:sanctum')->name('all_urls_with_visit_count');
