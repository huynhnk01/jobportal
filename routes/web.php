<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\CandidateInfoController;
use App\Http\Controllers\Profile\DashboardController;
use App\Http\Controllers\Profile\InitProfileController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Init Profile
Route::controller(InitProfileController::class)->middleware('auth', 'verified')->group(function () {
    Route::get('init-profile', 'index')->name('profile.init.index');
    Route::post('init-profile', 'store')->name('profile.init.store');
});

// Profile routes
Route::middleware('auth', 'verified')->prefix('profile')->name('profile.')->group(function () {
    // Dashboard or Settings Profile
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Candidate group routes
    Route::prefix('candidate')->name('candidate.')->group(function () {
        // Candidate Info
        Route::get('/info', [CandidateInfoController::class, 'index'])->name('info');

        // Edit Basic Info
        Route::get('/basic-info', [CandidateInfoController::class, 'editBasicInfo'])->name('basic.info');
        Route::patch('/basic-info/update', [CandidateInfoController::class, 'updateBasicInfo'])->name('basic.info.update');
    });

    // Generate Intro
    Route::post('/intro/generate', [CandidateInfoController::class, 'callAIFromGroq'])
        ->name('intro.generate');
});

require __DIR__ . '/auth.php';
