<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hewan extends Model
{
    protected $table = 'hewan';
    protected $primaryKey = 'id_hewan';
    public $timestamps = false;
    protected $fillable = [
        'id_pelanggan',
        'nama_hewan',
        'jenis_hewan',
        'ras',
        'usia',
        'berat_kg',
        'catatan_medis'
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_hewan', 'id_hewan');
    }
}
