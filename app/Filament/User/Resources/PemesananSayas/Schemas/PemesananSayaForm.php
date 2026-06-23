<?php

namespace App\Filament\User\Resources\PemesananSayas\Schemas;

use App\Models\Hewan;
use App\Models\Kamar;
use App\Models\Layanan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PemesananSayaForm
{
    public static function configure(Schema $schema): Schema
    {
        $pelangganId = auth('pelanggan')->id();

        return $schema
            ->columns(2)
            ->schema([
                Select::make('id_hewan')
                    ->label('Pilih Hewan Anda')
                    ->options(Hewan::where('id_pelanggan', $pelangganId)->pluck('nama_hewan', 'id_hewan'))
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),

                Select::make('id_kamar')
                    ->label('Pilih Kamar')
                    ->options(
                        Kamar::where('status_kamar', 'tersedia')->get()->mapWithKeys(
                            fn($k) => [
                                $k->id_kamar => $k->nomor_kamar . ' - ' .
                                strtoupper($k->tipe_kamar) . ' (Rp' .
                                number_format($k->harga_per_malam, 0, ',', '.') . '/mlm)'
                            ]
                        )
                    )
                    ->searchable()
                    ->required()
                    ->columnSpanFull(),

                DatePicker::make('tgl_masuk')
                    ->label('Tanggal Masuk')
                    ->required()
                    ->minDate(now()),

                DatePicker::make('tgl_keluar')
                    ->label('Tanggal Keluar')
                    ->required()
                    ->minDate(now()),

                Textarea::make('catatan_khusus')
                    ->label('Catatan Khusus')
                    ->placeholder('Catatan tambahan untuk pemesanan ini')
                    ->rows(3)
                    ->columnSpanFull(),

                Repeater::make('pemesananLayanan')
                    ->label('Tambah Layanan (Opsional)')
                    ->relationship()
                    ->schema([
                        Select::make('id_layanan')
                            ->label('Layanan')
                            ->options(
                                Layanan::where('tersedia', 1)->get()->mapWithKeys(
                                    fn($l) => [
                                        $l->id_layanan => $l->nama_layanan . ' (Rp' .
                                        number_format($l->harga, 0, ',', '.') . ')'
                                    ]
                                )
                            )
                            ->required()
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function($state, callable $set) {
                                $layanan = Layanan::find($state);
                                if ($layanan) {
                                    $set('subtotal', $layanan->harga);
                                }
                            }),

                        DatePicker::make('tgl_layanan')
                            ->label('Tanggal Layanan')
                            ->required(),

                        TextInput::make('qty')
                            ->label('Quantity')
                            ->numeric()
                            ->default(1)
                            ->required()
                            ->minValue(1)
                            ->reactive()
                            ->afterStateUpdated(function($state, callable $get, callable $set) {
                                $layanan = Layanan::find($get('id_layanan'));
                                if ($layanan) {
                                    $set('subtotal', $layanan->harga * $state);
                                }
                            }),

                        TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->numeric()
                            ->prefix('Rp')
                            ->required()
                            ->readOnly(),

                        Textarea::make('catatan')
                            ->label('Catatan Layanan')
                            ->placeholder('Catatan khusus untuk layanan ini')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->addActionLabel('Tambah Layanan')
                    ->columnSpanFull(),
            ]);
    }
}