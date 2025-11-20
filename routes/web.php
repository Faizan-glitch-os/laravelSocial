<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\FollowController;

Route::get('/post/create', [PostController::class, 'showCreatePost'])->middleware('auth');
Route::post('/post/create', [PostController::class, 'createPost'])->middleware('auth');

Route::get('/post/{post}/view', [PostController::class, 'viewPost'])->middleware('auth');

Route::get('/post/{post}/edit', [PostController::class, 'showEditPost'])->middleware(['auth', 'can:update,post']);
Route::put('/post/{post}/edit', [PostController::class, 'editPost'])->middleware(['auth', 'can:update,post']);

Route::delete('/post/{post}/delete', [PostController::class, 'deletePost'])->middleware(['auth', 'can:delete,post']);

Route::get('/', [RouteController::class, 'showCorrectHomepage'])->name('login');

Route::post('/profile/{user}/follow', [FollowController::class, 'follow'])->middleware('auth');
Route::post('/profile/{user}/unfollow', [FollowController::class, 'unFollow'])->middleware('auth');
Route::get('/profile/{user}/followers', [AuthController::class, 'showFollowers'])->middleware('auth');
Route::get('/profile/{user}/following', [AuthController::class, 'showFollowing'])->middleware('auth');

Route::get('/profile/upload-avatar', [RouteController::class, 'showAvatarForm'])->middleware('auth');
Route::post('/profile/upload-avatar', [RouteController::class, 'uploadAvatar'])->middleware('auth');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile/{user}', [AuthController::class, 'showProfile'])->middleware(['auth']);
