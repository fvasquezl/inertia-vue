<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store'])
    ->middleware('auth');

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
