<?php

namespace App\Filament\Admin\Resources\Pembayarans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 SESUAI CONTOH YANG BISA: Impor langsung dari folder Filament\Actions
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PembayaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_pembayaran')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('pemesanan.id_pemesanan')
                    ->label('ID Pemesanan')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('pemesanan.hewan.nama_hewan')
                    ->label('Hewan')
                    ->searchable(),

                TextColumn::make('pemesanan.hewan.pelanggan.nama_lengkap')
                    ->label('Pelanggan')
                    ->searchable(),

                TextColumn::make('grand_total')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),

                // 🔥 PERUBAHAN: Mengubah BadgeColumn menjadi TextColumn + badge()
                TextColumn::make('metode_bayar')
                    ->label('Metode')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'cash' => 'success',
                        'transfer' => 'info',
                        'kartu_debit' => 'warning',
                        'kartu_kredit' => 'primary',
                        'ewallet' => 'secondary',
                        default => 'secondary',
                    }),

                // 🔥 PERUBAHAN: Mengubah BadgeColumn menjadi TextColumn + badge()
                TextColumn::make('status_bayar')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'lunas' => 'success',
                        'pending' => 'warning',
                        'batal' => 'danger',
                        default => 'secondary',
                    }),

                TextColumn::make('tgl_bayar')
                    ->label('Tanggal Bayar')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status_bayar')
                    ->label('Filter Status')
                    ->options([
                        'lunas' => 'Lunas',
                        'pending' => 'Pending',
                        'batal' => 'Batal',
                    ]),

                SelectFilter::make('metode_bayar')
                    ->label('Filter Metode')
                    ->options([
                        'cash' => 'Cash',
                        'transfer' => 'Transfer Bank',
                        'kartu_debit' => 'Kartu Debit',
                        'kartu_kredit' => 'Kartu Kredit',
                        'ewallet' => 'E-Wallet',
                    ]),
            ])
            // 🔥 SESUAI CONTOH YANG BISA: Menggunakan recordActions
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat')
                    ->icon('heroicon-o-eye'),
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil-square'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->icon('heroicon-o-trash'),
            ])
            // 🔥 SESUAI CONTOH YANG BISA: Menggunakan toolbarActions
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->defaultSort('id_pembayaran', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}