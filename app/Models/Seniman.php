<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seniman extends Model {
    protected $table = 'senimans';
    protected $fillable = ['nama', 'negara'];

    // Relasi: Satu seniman memiliki banyak karya seni
    public function karyaSenis() {
        return $this->hasMany(KaryaSeni::class);
    }
}
