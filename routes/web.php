<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/post/create', [PostController::class, 'showCreatePost'])->middleware('auth');
Route::post('/post/create', [PostController::class, 'createPost'])->middleware('auth');

Route::get('/post/{post}/view', [PostController::class, 'viewPost'])->middleware('auth');

Route::get('/post/{post}/edit', [PostController::class, 'showEditPost'])->middleware(['auth', 'can:update,post']);
Route::put('/post/{post}/edit', [PostController::class, 'editPost'])->middleware(['auth', 'can:update,post']);

Route::delete('/post/{post}/delete', [PostController::class, 'deletePost'])->middleware(['auth', 'can:delete,post']);

Route::get('/', [RouteController::class, 'showCorrectHomepage'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile/{user}', [AuthController::class, 'showProfile'])->middleware(['auth', 'can:view,user']);
