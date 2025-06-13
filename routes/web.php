<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\PersonalController;
use App\Http\Controllers\Profile\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth', 'verified')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])
        ->name('index');

    Route::get('/personal', [PersonalController::class, 'index'])
        ->name('personal');

    Route::get('/personal/basic-info', [PersonalController::class, 'editBasicInfo'])
        ->name('personal.basic-info');

    Route::patch('/personal/basic-info/update', [PersonalController::class, 'updateBasicInfo'])
        ->name('personal.basic-info.update');

    Route::get('/intro', [ProfileController::class, 'showForm'])
        ->name('intro');

    Route::post('/intro/generate', [ProfileController::class, 'callAIFromGroq'])
        ->name('intro.generate');
});

require __DIR__ . '/auth.php';
