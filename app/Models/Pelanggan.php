<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable; // 🔥 Tambahkan trait notifikasi bawaan Laravel
use Filament\Models\Contracts\FilamentUser; // 🔥 Kontrak wajib untuk Filament
use Filament\Panel;
use Filament\Models\Contracts\HasName;

class Pelanggan extends Authenticatable implements FilamentUser, HasName
{
    use Notifiable; // 🔥 Gunakan trait notifikasi agar fitur reset password dll bisa bekerja

    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_telepon',
        'alamat',
        'status_member',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token', // 🔥 Amankan remember token untuk keamanan sesi login
    ];

    /**
     * 🔥 WAJIB UNTUK FILAMENT v5:
     * Menentukan siapa saja yang boleh login ke panel user/dashboard
     */

    public $timestamps = false;

    public function canAccessPanel(Panel $panel): bool
    {
        // Izinkan semua pelanggan yang terdaftar di database untuk mengakses panel 'user'
        if ($panel->getId() === 'user') {
            return true;
        }

        return false;
    }

    /**
     * 🔥 REKOMENDASI LARAVEL 11+:
     * Otomatis meng-hash password saat registrasi/update data
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($pelanggan) {
            // Jika nama_lengkap kosong (seperti saat register bawaan),
            // otomatis isi dengan username dari email (misal: user@gmail.com menjadi 'user')
            if (empty($pelanggan->nama_lengkap)) {
                $pelanggan->nama_lengkap = explode('@', $pelanggan->email)[0];
            }
        });
    }

    public function hewan(): HasMany
    {
        return $this->hasMany(Hewan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function getFilamentName(): string
    {
        return $this->nama_lengkap ?? 'Pelanggan';
    }
}
