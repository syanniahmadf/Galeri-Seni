<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Tambahkan ini
use Illuminate\Support\Facades\Schema; // Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Agar pagination Laravel otomatis pakai gaya Bootstrap (Laravel UI)
        Paginator::useBootstrapFive();

        // 2. Cegah error "key too long" pada database MySQL versi lama
        Schema::defaultStringLength(191);
    }
}