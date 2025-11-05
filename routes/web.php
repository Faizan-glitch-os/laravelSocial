<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'homePage']);

Route::post('/register', [AuthController::class, 'registerUser']);
