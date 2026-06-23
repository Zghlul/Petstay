<?php

namespace App\Filament\Admin\Resources\Pemesanans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 SESUAI CONTOH YANG BISA: Impor langsung dari folder Filament\Actions
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PemesanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_pemesanan')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('hewan.nama_hewan')
                    ->label('Hewan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('hewan.pelanggan.nama_lengkap')
                    ->label('Pemilik')
                    ->searchable(),

                TextColumn::make('kamar.nomor_kamar')
                    ->label('Kamar')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tgl_masuk')
                    ->label('Check-in')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('tgl_keluar')
                    ->label('Check-out')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('jumlah_malam')
                    ->label('Durasi')
                    ->suffix(' malam')
                    ->sortable(),

                // 🔥 PERUBAHAN: Mengubah BadgeColumn menjadi TextColumn + badge()
                TextColumn::make('status_pemesanan')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'aktif' => 'success',
                        'selesai' => 'gray',
                        'dibatalkan' => 'danger',
                        default => 'secondary',
                    }),
            ])
            ->filters([
                SelectFilter::make('status_pemesanan')
                    ->label('Filter Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),

                SelectFilter::make('id_hewan')
                    ->label('Filter Hewan')
                    ->relationship('hewan', 'nama_hewan')
                    ->searchable()
                    ->preload(),
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
            ->defaultSort('id_pemesanan', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}