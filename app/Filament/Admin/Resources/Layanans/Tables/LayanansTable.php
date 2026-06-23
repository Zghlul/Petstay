<?php

namespace App\Filament\Admin\Resources\Layanans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 SESUAI CONTOH YANG BISA: Impor langsung dari folder Filament\Actions
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class LayanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->searchable()
                    ->sortable(),

                // 🔥 PERUBAHAN: Mengubah BadgeColumn menjadi TextColumn + badge()
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'grooming' => 'info',
                        'medis' => 'success',
                        'pelatihan' => 'warning',
                        'nutrisi' => 'primary',
                        'hiburan' => 'danger',
                        'lainnya' => 'secondary',
                        default => 'secondary',
                    }),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('durasi_menit')
                    ->label('Durasi')
                    ->suffix(' menit')
                    ->sortable()
                    ->toggleable(),

                IconColumn::make('tersedia')
                    ->label('Tersedia')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('kategori')
                    ->label('Filter Kategori')
                    ->options([
                        'grooming' => 'Grooming',
                        'medis' => 'Medis',
                        'pelatihan' => 'Pelatihan',
                        'nutrisi' => 'Nutrisi',
                        'hiburan' => 'Hiburan',
                        'lainnya' => 'Lainnya',
                    ]),

                SelectFilter::make('tersedia')
                    ->label('Filter Status')
                    ->options([
                        '1' => 'Tersedia',
                        '0' => 'Tidak Tersedia',
                    ]),
            ])
            // 🔥 SESUAI CONTOH YANG BISA: Menggunakan recordActions
            ->recordActions([
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
            ->defaultSort('nama_layanan', 'asc')
            ->paginated([10, 25, 50, 100]);
    }
}