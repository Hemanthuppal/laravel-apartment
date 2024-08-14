<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::get('manager/dashboard', [HomeController::class, 'managerIndex'])
    ->middleware(['auth', 'manager'])
    ->name('manager.dashboard');

Route::get('resident/dashboard', [HomeController::class, 'residentIndex'])
    ->middleware(['auth', 'resident'])
    ->name('resident.dashboard');

Route::get('watchman/dashboard', [HomeController::class, 'watchmanIndex'])
    ->middleware(['auth', 'watchman'])
    ->name('watchman.dashboard');

Route::get('superadmin/dashboard', [HomeController::class, 'superadminIndex'])
    ->middleware(['auth', 'superadmin'])
    ->name('superadmin.dashboard');

// General dashboard route
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');