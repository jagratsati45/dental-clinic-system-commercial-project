<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::view('/admin/dashboard', 'admin.dashboard')
        ->middleware('role:admin');

    Route::view('/doctor/dashboard', 'doctor.dashboard')
        ->middleware('role:doctor');

    Route::view('/receptionist/dashboard', 'receptionist.dashboard')
        ->middleware('role:receptionist');
});

Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
