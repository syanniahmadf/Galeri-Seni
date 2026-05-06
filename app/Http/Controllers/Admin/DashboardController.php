<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Seniman;
use App\Models\Kategori;
use App\Models\Pameran;
use App\Models\KaryaSeni;

class DashboardController extends Controller {
    public function index() {
        $stats = [
            'total_seniman' => Seniman::count(),
            'total_kategori' => Kategori::count(),
            'total_pameran' => Pameran::count(),
            'total_karya' => KaryaSeni::count(),
        ];
        $latest_karya = KaryaSeni::with(['seniman', 'kategori'])->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'latest_karya'));
    }
}