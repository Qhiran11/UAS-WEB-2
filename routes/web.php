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

// Rute yang memerlukan Login (untuk semua user & admin)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    // TAMBAHKAN ROUTE INI
    Route::get('/tentang-kami', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Rute Komponen yang bisa diakses publik (setelah login)
    Route::get('/komponen', [KomponenController::class, 'index'])->name('komponen.index');
    Route::get('/komponen/{komponen}', [KomponenController::class, 'show'])->name('komponen.show');

    Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
});

// --- RUTE KHUSUS ADMIN ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute Manajemen User
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    
    // Rute Manajemen Jenis Komponen
    Route::resource('jenis_komponen', JenisKomponenController::class);

    // Rute Manajemen Komponen (Create, Store, Edit, Update, Destroy)
    Route::resource('komponen', KomponenController::class)->except(['index', 'show']);
});