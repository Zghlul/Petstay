<?php

namespace App\Filament\User\Resources\HewanSayas\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HewanSayaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                // 🔥 AUTO FILL id_pelanggan dengan user yang login
                Hidden::make('id_pelanggan')
                    ->default(fn() => auth('pelanggan')->id()),

                TextInput::make('nama_hewan')
                    ->label('Nama Hewan')
                    ->required()
                    ->maxLength(50)
                    ->placeholder('Masukkan nama hewan'),

                Select::make('jenis_hewan')
                    ->label('Jenis Hewan')
                    ->options([
                        'anjing' => 'Anjing',
                        'kucing' => 'Kucing',
                        'kelinci' => 'Kelinci',
                        'burung' => 'Burung',
                        'hamster' => 'Hamster',
                        'reptil' => 'Reptil',
                        'lainnya' => 'Lainnya'
                    ])
                    ->required()
                    ->searchable(),

                TextInput::make('ras')
                    ->label('Ras')
                    ->maxLength(50)
                    ->placeholder('Contoh: Golden Retriever, Persia'),

                TextInput::make('usia')
                    ->label('Usia (Bulan)')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(300)
                    ->suffix('bulan')
                    ->placeholder('Masukkan usia dalam bulan'),

                TextInput::make('berat_kg')
                    ->label('Berat (Kg)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(200)
                    ->suffix('kg')
                    ->placeholder('Masukkan berat dalam kg')
                    ->step(0.01),

                Textarea::make('catatan_medis')
                    ->label('Catatan Medis')
                    ->placeholder('Riwayat kesehatan, alergi, atau catatan khusus lainnya')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}