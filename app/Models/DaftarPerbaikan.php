<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPerbaikan extends Model
{
    protected $table = 'daftar_perbaikan';
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
