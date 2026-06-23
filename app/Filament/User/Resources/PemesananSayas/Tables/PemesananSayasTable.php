<?php

namespace App\Filament\User\Resources\PemesananSayas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 PERUBAHAN: Impor Action langsung dari folder Filament\Actions
use Filament\Actions\Action;

class PemesananSayasTable
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

                TextColumn::make('kamar.nomor_kamar')
                    ->label('Kamar')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kamar.tipe_kamar')
                    ->label('Tipe Kamar')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'standard' => 'secondary',
                        'deluxe' => 'warning',
                        'vip' => 'success',
                        default => 'secondary',
                    }),

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

                TextColumn::make('status_pemesanan')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'aktif' => 'success',
                        'selesai' => 'gray',
                        'dibatalkan' => 'danger',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),
            ])
            ->filters([
                SelectFilter::make('status_pemesanan')
                    ->label('Filter Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),
            ])
            // 🔥 PERUBAHAN: Menggunakan recordActions untuk aksi di baris tabel
            ->recordActions([
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye'),
                
                Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-o-pencil-square')
                    ->visible(fn($record) => $record->status_pemesanan === 'aktif'),
                
                Action::make('batalkan')
                    ->label('Batalkan')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn($record) => $record->status_pemesanan === 'aktif')
                    ->action(fn($record) => $record->update(['status_pemesanan' => 'dibatalkan'])),
            ])
            ->bulkActions([])
            ->defaultSort('id_pemesanan', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}