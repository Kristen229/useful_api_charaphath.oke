<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModulesController;
use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/modules', [ModulesController::class, 'index']);
