<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/create-post', [PostController::class, 'showCreatePost']);
Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/', [RouteController::class, 'showCorrectHomepage']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
