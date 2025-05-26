<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\Auth\SessionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisteredController::class, 'index'])->name('register');
Route::get('/login', [SessionController::class, 'index'])->name('login');
