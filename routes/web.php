<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\JenisKomponenController;
use App\Http\Controllers\ProfileController;

// Rute untuk halaman utama, langsung arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute untuk Tamu (Guest) - Hanya bisa diakses jika belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
});

// Rute yang Memerlukan Login (Authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Resourceful Routes untuk Komponen
    Route::resource('komponen', KomponenController::class);

    // Routes untuk Jenis Komponen
    Route::get('/jenis_komponen', [JenisKomponenController::class, 'index'])->name('jenis_komponen.index');
    
    // Rute Khusus Admin
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    });
});