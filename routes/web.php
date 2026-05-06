<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SenimanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PameranController;
use App\Http\Controllers\Admin\KaryaSeniController;
use Illuminate\Support\Facades\Auth;

// 1. Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Auth Routes (Registrasi dimatikan agar lebih eksklusif)
Auth::routes(['register' => false]);

// 3. Grouping Admin dengan Middleware Auth
Route::prefix('admin')->middleware('auth')->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Resource Routes untuk Manajemen Data
    Route::resource('seniman', SenimanController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pameran', PameranController::class);
    Route::resource('karya-seni', KaryaSeniController::class);
});

// 4. Redirect /home ke Dashboard Admin (Bawaan Laravel UI)
Route::get('/home', function() {
    return redirect()->route('admin.dashboard');
});