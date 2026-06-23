<?php

namespace App\Filament\User\Widgets;

use App\Models\Pemesanan;
use App\Models\Hewan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Ambil ID pelanggan yang sedang login di sesi tersebut
        $pelangganId = auth('pelanggan')->id();

        // 1. Hitung jumlah anabul/hewan milik user ini
        $jumlahHewan = Hewan::where('id_pelanggan', $pelangganId)->count();

        // 2. Hitung total reservasi yang pernah dibuat oleh user ini
        // Menggunakan whereHas karena relasi pemesanan tersambung lewat tabel hewan
        $totalPemesanan = Pemesanan::whereHas('hewan', function ($query) use ($pelangganId) {
            $query->where('id_pelanggan', $pelangganId);
        })->count();

        return [
            Stat::make('Anabul Saya', $jumlahHewan . ' Ekor')
                ->description('Jumlah hewan peliharaan Anda yang terdaftar')
                ->descriptionIcon('heroicon-m-heart')
                ->color('primary'),

            Stat::make('Total Pemesanan', $totalPemesanan . ' Kali')
                ->description('Riwayat penitipan Anda di PetStay')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('success'),
        ];
    }
}
