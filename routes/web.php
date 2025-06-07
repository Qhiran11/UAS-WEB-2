<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KomponenController;

use App\Http\Controllers\JenisKomponenController;

Route::get('/jenis_komponen', [JenisKomponenController::class, 'index'])->name('jenis_komponen.index');


// Route utama
Route::get('/', function () {
    return view('dashboard'); // cukup 'dashboard', tanpa slash di depan
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes untuk Student

// Routes untuk Komponen
Route::get('/komponen', [KomponenController::class, 'index'])->name('komponen.index');
Route::get('/komponen/create', [KomponenController::class, 'create'])->name('komponen.create');
Route::post('/komponen', [KomponenController::class, 'store'])->name('komponen.store');
Route::get('/komponen/{id}', [KomponenController::class, 'show'])->name('komponen.show');
Route::get('/komponen/{id}/edit', [KomponenController::class, 'edit'])->name('komponen.edit');
Route::put('/komponen/{id}', [KomponenController::class, 'update'])->name('komponen.update');
Route::delete('/komponen/{id}', [KomponenController::class, 'destroy'])->name('komponen.destroy');
