<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');

// login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.create');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

// Profile modification here
Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');
Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'update'])->middleware('auth')->name('profile.update');

// Post controll here
Route::post('/post/create', [PostController::class, 'store'])->middleware('auth')->name('post.create');
Route::get('/post/view/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'update'])->middleware('auth')->name('post.update');
Route::post('/post/delete/{id}', [PostController::class, 'destroy'])->middleware('auth')->name('post.delete');
