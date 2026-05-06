<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    \App\Models\User::create([
        'name' => 'Administrator',
        'email' => 'admin@galeri.com',
        'password' => Hash::make('password123'),
    ]);

    $seniman = \App\Models\Seniman::create(['nama' => 'Basoeki Abdullah', 'negara' => 'Indonesia']);
    $kategori = \App\Models\Kategori::create(['nama' => 'Lukisan']);
    $pameran = \App\Models\Pameran::create(['nama' => 'Grand Opening', 'lokasi' => 'Jakarta', 'tanggal' => now()]);

    \App\Models\KaryaSeni::create([
        'judul' => 'Pemandangan Alam',
        'seniman_id' => $seniman->id,
        'kategori_id' => $kategori->id,
        'pameran_id' => $pameran->id,
        'gambar' => 'placeholder.jpg',
        'deskripsi' => 'Karya indah pemandangan pegunungan.'
    ]);
    }
}
