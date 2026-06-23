<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemesananLayanan extends Pivot
{
    protected $table = 'pemesanan_layanan';
    protected $primaryKey = 'id_ps_layanan';
    public $timestamps = false;
    protected $fillable = [
        'id_pemesanan', 'id_layanan', 'tgl_layanan', 'qty', 'subtotal', 'catatan'
    ];

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id_layanan');
    }
}