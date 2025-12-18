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
    Route::get('/universities/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.universities.create');
        Route::post('/universities', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.universities.store');
     // Edit & Update
    Route::get('/universities/{university}/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.universities.edit');
    Route::put('/universities/{university}', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.universities.update');
    
    // Delete
    Route::delete('/universities/{university}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.universities.destroy');
    });

    //Admin Account Management
    Route::get('/admins/create', [\App\Http\Controllers\AdminController::class, 'createAdmin'])->name('admin.admins.create');
    Route::post('/admins', [\App\Http\Controllers\AdminController::class, 'storeAdmin'])->name('admin.admins.store');
});