<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponsel extends Model
{
    protected $table = 'ponsel';
    protected $primaryKey = 'id_ponsel';
    protected $fillable = [
        'merk',
        'model',
        'harga_jual',
        'harga_beli',
        'stok',
        'status',
        'processor',
        'dimension',
        'ram',
        'storage',
        'gambar',
    ];

    public function ulasan()
{
    return $this->hasMany(Ulasan::class, 'id_ponsel', 'id_ponsel');
}
}




