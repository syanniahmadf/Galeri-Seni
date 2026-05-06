<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SenimanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PameranController;
use App\Http\Controllers\Admin\KaryaSeniController;
use Illuminate\Support\Facades\Auth;
 
// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

// Auth Routes (Nonaktifkan registrasi jika perlu)
Auth::routes(['register' => false]);

// Grouping Admin dengan Middleware Auth
Route::prefix('admin')->middleware('auth')->group(function () {
    
    // Pastikan ->name('admin.dashboard') tertulis dengan benar
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Resource Routes
    Route::resource('seniman', SenimanController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pameran', PameranController::class);
    Route::resource('karya-seni', KaryaSeniController::class);
});

// Tambahan redirect jika ada yang mengakses /home secara tidak sengaja
Route::get('/home', function() {
    return redirect()->route('admin.dashboard');
});