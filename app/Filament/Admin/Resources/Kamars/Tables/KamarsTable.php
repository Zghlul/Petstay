<?php

namespace App\Filament\Admin\Resources\Kamars\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;


class KamarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_kamar')
                    ->label('Nomor Kamar')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tipe_kamar')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'standard' => 'secondary',
                        'deluxe' => 'warning',
                        'vip' => 'success',
                        default => 'secondary',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'standard' => 'heroicon-o-home',
                        'deluxe' => 'heroicon-o-star',
                        'vip' => 'heroicon-o-star',
                        default => 'heroicon-o-home',
                    })
                    ->formatStateUsing(fn($state) => strtoupper($state)),

                TextColumn::make('kapasitas')
                    ->label('Kapasitas')
                    ->sortable()
                    ->suffix(' ekor'),

                TextColumn::make('harga_per_malam')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('fasilitas')
                    ->label('Fasilitas')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public') // Mengakses folder storage/app/public
                    ->circular(),   // Tampilan bundar

                TextColumn::make('status_kamar')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'terisi' => 'danger',
                        'maintenance' => 'warning',
                        default => 'secondary',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'tersedia' => 'heroicon-o-check-circle',
                        'terisi' => 'heroicon-o-x-circle',
                        'maintenance' => 'heroicon-o-exclamation-triangle',
                        default => 'heroicon-o-minus-circle',
                    })
                    ->formatStateUsing(fn($state) => ucfirst($state)),
            ])
            ->filters([
                SelectFilter::make('tipe_kamar')
                    ->label('Filter Tipe')
                    ->options([
                        'standard' => 'Standard',
                        'deluxe' => 'Deluxe',
                        'vip' => 'VIP',
                    ]),

                SelectFilter::make('status_kamar')
                    ->label('Filter Status')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'terisi' => 'Terisi',
                        'maintenance' => 'Maintenance',
                    ]),
            ])

            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil-square'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->icon('heroicon-o-trash'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->defaultSort('id_kamar', 'asc')
            ->paginated([10, 25, 50, 100]);
    }
}
