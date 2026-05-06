<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pameran extends Model {
    protected $fillable = ['nama', 'lokasi', 'tanggal'];

    public function karyaSenis() {
        return $this->hasMany(KaryaSeni::class);
    }
}
