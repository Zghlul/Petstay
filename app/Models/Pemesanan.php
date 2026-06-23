<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $incrementing = true;
    const CREATED_AT = 'tgl_dibuat';
    const UPDATED_AT = null;
    protected $fillable = [
        'id_hewan',
        'id_kamar',
        'tgl_masuk',
        'tgl_keluar',
        'jumlah_malam',
        'status_pemesanan',
        'catatan_khusus'
    ];

    /**
     * 🔥 TAMBAHKAN LOGIKA INI UNTUK SINKRONISASI STATUS KAMAR OTOMATIS
     */
    protected static function booted()
    {
        // 1. Saat Pemesanan Baru Dibuat -> Kamar otomatis 'terisi'
        static::created(function ($pemesanan) {
            if ($pemesanan->id_kamar) {
                Kamar::where('id_kamar', $pemesanan->id_kamar)
                    ->update(['status_kamar' => 'terisi']);
            }
        });

        // 2. Saat Pemesanan Diupdate (Misal status berubah menjadi batal)
        static::updated(function ($pemesanan) {
            // Cek apakah kolom status_pemesanan diubah, dan nilainya diubah jadi 'batal'
            // *Catatan: Sesuaikan string 'batal' dengan value status batal di aplikasi Anda (misal: 'cancelled', 'batal', dll)*
            if ($pemesanan->isDirty('status_pemesanan') && $pemesanan->status_pemesanan === 'batal') {
                if ($pemesanan->id_kamar) {
                    Kamar::where('id_kamar', $pemesanan->id_kamar)
                        ->update(['status_kamar' => 'tersedia']);
                }
            }
        });

        // 3. Saat Pemesanan Dihapus/Delete -> Kamar otomatis kembali 'tersedia'
        static::deleted(function ($pemesanan) {
            if ($pemesanan->id_kamar) {
                Kamar::where('id_kamar', $pemesanan->id_kamar)
                    ->update(['status_kamar' => 'tersedia']);
            }
        });
    }

    // --- Relasi di bawah ini tetap biarkan sama seperti kode lama Anda ---
    public function hewan(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'id_hewan', 'id_hewan');
    }

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id_kamar');
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function layanan(): BelongsToMany
    {
        return $this->belongsToMany(
            Layanan::class,
            'pemesanan_layanan',
            'id_pemesanan',
            'id_layanan'
        )->withPivot(['id_ps_layanan', 'tgl_layanan', 'qty', 'subtotal', 'catatan']);
    }

    public function pemesananLayanan(): HasMany
    {
        return $this->hasMany(PemesananLayanan::class, 'id_pemesanan', 'id_pemesanan');
    }
}
