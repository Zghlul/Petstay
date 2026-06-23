<?php

namespace App\Filament\Admin\Resources\Pelanggans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// 🔥 SESUAI CONTOH YANG BISA: Impor dari folder Filament\Actions
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PelanggansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_pelanggan')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_telepon')
                    ->label('No. Telepon')
                    ->searchable(),

                // 🔥 PERUBAHAN: Mengubah BadgeColumn menjadi TextColumn + badge()
                TextColumn::make('status_member')
                    ->label('Status Member')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'regular' => 'warning',
                        'premium' => 'success',
                        default => 'secondary',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'regular' => 'heroicon-o-user',
                        'premium' => 'heroicon-o-star',
                        default => 'heroicon-o-user',
                    }),

                TextColumn::make('tgl_daftar')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status_member')
                    ->label('Filter Status Member')
                    ->options([
                        'regular' => 'Regular',
                        'premium' => 'Premium',
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
            ->defaultSort('id_pelanggan', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}