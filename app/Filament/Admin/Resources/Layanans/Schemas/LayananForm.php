<?php

namespace App\Filament\Admin\Resources\Layanans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('Contoh: Grooming Premium'),

                Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'grooming' => 'Grooming',
                        'medis' => 'Medis',
                        'pelatihan' => 'Pelatihan',
                        'nutrisi' => 'Nutrisi',
                        'hiburan' => 'Hiburan',
                        'lainnya' => 'Lainnya'
                    ])
                    ->required()
                    ->searchable(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->placeholder('Jelaskan layanan yang ditawarkan')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->prefix('Rp')
                    ->placeholder('Masukkan harga')
                    ->step(1000),

                TextInput::make('durasi_menit')
                    ->label('Durasi (Menit)')
                    ->numeric()
                    ->default(30)
                    ->minValue(0)
                    ->maxValue(1440)
                    ->suffix('menit')
                    ->placeholder('Masukkan durasi dalam menit'),

                Toggle::make('tersedia')
                    ->label('Tersedia')
                    ->default(true)
                    ->inline()
                    ->helperText('Nonaktifkan jika layanan sedang tidak tersedia'),
            ]);
    }
}