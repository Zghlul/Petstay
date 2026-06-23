<?php

namespace App\Filament\Admin\Resources\Pelanggans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('Masukkan nama lengkap'),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->placeholder('Masukkan alamat email'),

                TextInput::make('no_telepon')
                    ->label('No. Telepon')
                    ->required()
                    ->maxLength(15)
                    ->placeholder('Contoh: 08123456789'),

                Textarea::make('alamat')
                    ->label('Alamat')
                    ->placeholder('Masukkan alamat lengkap')
                    ->rows(3)
                    ->columnSpanFull(),

                Select::make('status_member')
                    ->label('Status Member')
                    ->options([
                        'regular' => 'Regular',
                        'premium' => 'Premium'
                    ])
                    ->required()
                    ->default('regular'),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => bcrypt($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context) => $context === 'create')
                    ->placeholder(fn(string $context) => 
                        $context === 'create' ? 'Masukkan password' : 'Kosongkan jika tidak diubah'
                    )
                    ->helperText(fn(string $context) => 
                        $context === 'edit' ? 'Kosongkan jika tidak ingin mengubah password' : ''
                    )
                    ->columnSpanFull(),
            ]);
    }
}