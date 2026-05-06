<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/* Import Controller sesuai struktur folder kamu */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SenimanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PameranController;
use App\Http\Controllers\Admin\KaryaSeniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Root redirect: Jika buka halaman utama, langsung diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Auth Routes: Bawaan Laravel UI
// 'register' => false digunakan jika kamu ingin mematikan fitur daftar akun baru
Auth::routes(['register' => false]);

// 3. Admin Group: Semua route di dalam sini akan diawali dengan '/admin/...'
// Dan hanya bisa diakses jika user sudah login (middleware auth)
Route::prefix('admin')->middleware('auth')->group(function () {
    
    // Dashboard Utama
    // Route name 'dashboard' harus sama dengan yang ada di href sidebar kamu
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Resource Routes: Otomatis menghandle (Index, Create, Store, Edit, Update, Destroy)
    Route::resource('seniman', SenimanController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('pameran', PameranController::class);
    Route::resource('karya-seni', KaryaSeniController::class);
    
});