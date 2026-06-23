<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    const CREATED_AT = 'tgl_bayar';
    const UPDATED_AT = null;
    protected $fillable = [
        'id_pemesanan',
        'total_kamar',
        'total_layanan',
        'grand_total',
        'metode_bayar',
        'status_bayar',
        'keterangan'
    ];

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }
}
