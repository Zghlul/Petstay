<?php

namespace App\Filament\Admin\Resources\Pemesanans\Pages;

use App\Filament\Admin\Resources\Pemesanans\PemesananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPemesanans extends ListRecords
{
    protected static string $resource = PemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Pemesanan')
                ->icon('heroicon-o-plus')
                ->modalHeading('Tambah Pemesanan Baru'),
        ];
    }
}