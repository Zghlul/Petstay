<?php

namespace App\Filament\User\Resources\HewanSayas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 PERUBAHAN: Impor Action dan BulkAction langsung dari Filament\Actions
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;

class HewanSayasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_hewan')
                    ->label('Nama Hewan')
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
            ])
            // 🔥 PERUBAHAN: Menggunakan recordActions untuk baris tabel
            ->recordActions([
                Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-o-pencil-square'),
                Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn($record) => $record->delete()),
            ])
            // 🔥 PERUBAHAN: Menggunakan toolbarActions untuk aksi massal
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('delete')
                        ->label('Hapus Terpilih')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn($records) => $records->each->delete()),
                ]),
            ])
            ->defaultSort('id_hewan', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}