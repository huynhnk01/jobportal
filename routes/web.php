<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\Personal\PersonalController;
use App\Http\Controllers\Profile\Personal\PersonalInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/personal', [PersonalController::class, 'index'])->name('personal');
    Route::get('/personal-info', [PersonalInfoController::class, 'index'])->name('personal-info');
    Route::patch('/personal-info/update', [PersonalInfoController::class, 'update'])->name('personal-info.update');
});

require __DIR__ . '/auth.php';
