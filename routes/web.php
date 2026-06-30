<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::view('/dashboard', 'admin.dashboard')
        ->name('admin.dashboard');

    Route::resource('patients', PatientController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('users', UserController::class)->names('admin.users');
    
});

// Doctor Routes
Route::middleware(['auth', 'role:doctor'])->group(function () {

    Route::view('/doctor/dashboard', 'doctor.dashboard')
        ->name('doctor.dashboard');
});

// Receptionist Routes
Route::middleware(['auth', 'role:receptionist'])->group(function () {

    Route::view('/receptionist/dashboard', 'receptionist.dashboard')
        ->name('receptionist.dashboard');
});

// Default redirect after login
Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
})->middleware('auth')->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';