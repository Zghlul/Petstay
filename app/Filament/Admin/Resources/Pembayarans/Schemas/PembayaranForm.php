<?php

namespace App\Filament\Admin\Resources\Pembayarans\Schemas;

use App\Models\Pemesanan;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembayaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                Select::make('id_pemesanan')
                    ->label('Pemesanan')
                    ->options(
                        Pemesanan::with('hewan')->get()->mapWithKeys(
                            fn($p) => [$p->id_pemesanan => '#'.$p->id_pemesanan.' - '.$p->hewan->nama_hewan]
                        )
                    )
                    ->searchable()
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('total_kamar')
                    ->label('Total Kamar')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->prefix('Rp')
                    ->placeholder('Masukkan total kamar'),

                TextInput::make('total_layanan')
                    ->label('Total Layanan')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->prefix('Rp')
                    ->placeholder('Masukkan total layanan'),

                TextInput::make('grand_total')
                    ->label('Grand Total')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->prefix('Rp')
                    ->placeholder('Masukkan grand total'),

                Select::make('metode_bayar')
                    ->label('Metode Pembayaran')
                    ->options([
                        'cash' => 'Cash',
                        'transfer' => 'Transfer Bank',
                        'kartu_debit' => 'Kartu Debit',
                        'kartu_kredit' => 'Kartu Kredit',
                        'ewallet' => 'E-Wallet'
                    ])
                    ->required()
                    ->searchable(),

                Select::make('status_bayar')
                    ->label('Status Pembayaran')
                    ->options([
                        'lunas' => 'Lunas',
                        'pending' => 'Pending',
                        'batal' => 'Batal'
                    ])
                    ->required()
                    ->default('pending'),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->placeholder('Catatan tambahan tentang pembayaran')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}