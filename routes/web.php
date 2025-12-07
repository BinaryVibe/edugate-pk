<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;

// Homepage Route (Lists all universities)
Route::get('/', [UniversityController::class, 'index'])->name('home');

// Detail Page Route (We will build the view for this next)
Route::get('/university/{university}', [UniversityController::class, 'show'])->name('universities.show');