<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'index'])->name('home');

// login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.create');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

// Profile modification here
Route::get('/profile', [UserController::class, 'show'])->middleware('auth')->name('profile');
Route::get('/profile/edit', [UserController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth')->name('profile.update');

// Post controll here
Route::post('/post/create', [postController::class, 'store'])->middleware('auth')->name('post.create');
Route::get('/post/view/{id}', [postController::class, 'show'])->name('post.show');
Route::get('/post/edit/{id}', [postController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::post('/post/update/{id}', [postController::class, 'update'])->middleware('auth')->name('post.update');
Route::post('/post/delete/{id}', [postController::class, 'destroy'])->middleware('auth')->name('post.delete');
