<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AdminAuthController;

// Public Routes
Route::get('/', [UniversityController::class, 'index'])->name('home');
Route::get('/university/{university}', [UniversityController::class, 'show'])->name('universities.show');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Login Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Routes (Only accessible if logged in)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    });
});