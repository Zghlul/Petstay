<?php

namespace App\Filament\Admin\Resources\Hewans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 SESUAI CONTOH YANG BISA: Impor langsung dari Filament\Actions
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction; // Ditambahkan untuk tombol hapus
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class HewansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_hewan')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('nama_hewan')
                    ->label('Nama Hewan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('pelanggan.nama_lengkap')
                    ->label('Pemilik')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_hewan')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'anjing' => 'info',
                        'kucing' => 'success',
                        'kelinci' => 'warning',
                        'burung' => 'primary',
                        'hamster' => 'danger',
                        'reptil' => 'gray',
                        'lainnya' => 'secondary',
                        default => 'secondary',
                    }),

                TextColumn::make('ras')
                    ->label('Ras')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('usia')
                    ->label('Usia')
                    ->suffix(' bln')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('berat_kg')
                    ->label('Berat')
                    ->suffix(' kg')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('catatan_medis')
                    ->label('Catatan Medis')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('jenis_hewan')
                    ->label('Filter Jenis')
                    ->options([
                        'anjing' => 'Anjing',
                        'kucing' => 'Kucing',
                        'kelinci' => 'Kelinci',
                        'burung' => 'Burung',
                        'hamster' => 'Hamster',
                        'reptil' => 'Reptil',
                        'lainnya' => 'Lainnya'
                    ]),

                SelectFilter::make('id_pelanggan')
                    ->label('Filter Pemilik')
                    ->relationship('pelanggan', 'nama_lengkap')
                    ->searchable()
                    ->preload(),
            ])
            // 🔥 SESUAI CONTOH YANG BISA: Menggunakan recordActions
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            // 🔥 SESUAI CONTOH YANG BISA: Menggunakan toolbarActions
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('id_hewan', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}
