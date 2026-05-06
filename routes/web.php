<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SenimanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PameranController;
use App\Http\Controllers\Admin\KaryaSeniController;
use Illuminate\Support\Facades\Auth;

// Root redirect
Route::get('/', fn() => redirect('/login'));

// Auth Routes (Disable registration if needed in Auth::routes())
Auth::routes(['register' => false]);

// Admin Group
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('seniman', SenimanController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pameran', PameranController::class);
    Route::resource('karya-seni', KaryaSeniController::class);
});