<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    public $timestamps = false;
    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'kapasitas',
        'harga_per_malam',
        'fasilitas',
        'status_kamar',
        'foto'
    ];

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_kamar', 'id_kamar');
    }
}
