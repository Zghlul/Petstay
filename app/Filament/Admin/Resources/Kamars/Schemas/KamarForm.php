<?php

namespace App\Filament\Admin\Resources\Kamars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;


class KamarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('nomor_kamar')
                    ->label('Nomor Kamar')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->placeholder('Contoh: A101, B202')
                    ->maxLength(10),

                Select::make('tipe_kamar')
                    ->label('Tipe Kamar')
                    ->options([
                        'standard' => 'Standard',
                        'deluxe' => 'Deluxe',
                        'vip' => 'VIP'
                    ])
                    ->required()
                    ->searchable(),

                TextInput::make('kapasitas')
                    ->label('Kapasitas')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->minValue(1)
                    ->maxValue(10)
                    ->suffix('hewan'),

                TextInput::make('harga_per_malam')
                    ->label('Harga per Malam')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->prefix('Rp')
                    ->placeholder('Masukkan harga')
                    ->step(1000),

                Textarea::make('fasilitas')
                    ->label('Fasilitas')
                    ->placeholder('Tuliskan fasilitas yang tersedia di kamar ini')
                    ->rows(3)
                    ->columnSpanFull(),

                Select::make('status_kamar')
                    ->label('Status Kamar')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'terisi' => 'Terisi',
                        'maintenance' => 'Maintenance'
                    ])
                    ->required()
                    ->default('tersedia')
                    ->columnSpanFull(),

                FileUpload::make('foto')
                    ->label('Foto Kamar')
                    ->image()
                    ->disk('public')
                    ->directory('rooms')
                    ->visibility('public')
                    ->imageEditor()
                    ->imageEditor()->maxWidth(1024)
                    ->maxSize(10240)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
