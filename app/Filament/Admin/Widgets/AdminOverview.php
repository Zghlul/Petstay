<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Models\Pembayaran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminOverview extends BaseWidget
{
    // Atur agar widget ini hanya muncul di halaman dashboard admin, bukan user
    // (Bisa dikosongkan jika folder pemanggilannya sudah terpisah)

    protected function getStats(): array
    {
        // 1. Hitung total pendapatan dari pembayaran yang sudah sukses/lunas
        $totalPendapatan = Pembayaran::where('status_bayar', 'lunas')->sum('grand_total');

        // 2. Hitung jumlah pesanan baru yang butuh diproses
        $pesananBaru = Pemesanan::where('status_pemesanan', 'pending')->count();

        // 3. Hitung berapa kamar yang sedang terisi saat ini
        $kamarTerisi = Kamar::where('status_kamar', 'terisi')->count();

        return [
            Stat::make('Total Penjualan (Lunas)', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'))
                ->description('Total uang masuk dari reservasi lunas')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Pesanan Menunggu', $pesananBaru . ' Pesanan')
                ->description('Perlu konfirmasi admin')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Kamar Terisi', $kamarTerisi . ' Kamar')
                ->description('Sedang digunakan oleh hewan peliharaan')
                ->descriptionIcon('heroicon-m-home')
                ->color('info'),
        ];
    }
}
