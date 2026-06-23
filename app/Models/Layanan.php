<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    public $timestamps = false;
    protected $fillable = [
        'nama_layanan', 'kategori', 'deskripsi', 'harga',
        'durasi_menit', 'tersedia'
    ];

    public function pemesanan(): BelongsToMany
    {
        return $this->belongsToMany(
            Pemesanan::class,
            'pemesanan_layanan',
            'id_layanan',
            'id_pemesanan'
        )->withPivot(['tgl_layanan', 'qty', 'subtotal', 'catatan'])
         ->using(PemesananLayanan::class);
    }
}