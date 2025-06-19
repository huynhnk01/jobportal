<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\CandidateInfoController;
use App\Http\Controllers\Profile\DashboardController;
use App\Http\Controllers\Profile\InitProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(InitProfileController::class)
    ->middleware('auth', 'verified')
    ->prefix('init-profile')
    ->name('profile.init.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

Route::middleware('auth', 'verified')
    ->prefix('profile')
    ->name('profile.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/candidate-info', [CandidateInfoController::class, 'index'])
            ->name('candidate.info');

        Route::get('/candidate/basic-info', [CandidateInfoController::class, 'editBasicInfo'])
            ->name('candidate.basic.info');

        Route::patch('/candidate/basic-info/update', [CandidateInfoController::class, 'updateBasicInfo'])
            ->name('candidate.basic.info.update');

        Route::post('/intro/generate', [CandidateInfoController::class, 'callAIFromGroq'])
            ->name('intro.generate');
    });

require __DIR__ . '/auth.php';
