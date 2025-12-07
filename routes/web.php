<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;

// Homepage Route
Route::get('/', [UniversityController::class, 'index'])->name('home');

// Detail Page Route
Route::get('/university/{university}', [UniversityController::class, 'show'])->name('universities.show');