<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KaryaSeni extends Model {
    protected $fillable = ['judul', 'seniman_id', 'kategori_id', 'pameran_id', 'gambar', 'deskripsi'];

    // Relasi balik (Belongs To)
    public function seniman() {
        return $this->belongsTo(Seniman::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function pameran() {
        return $this->belongsTo(Pameran::class);
    }
}
