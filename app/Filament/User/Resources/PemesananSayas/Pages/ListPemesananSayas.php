<?php

namespace App\Filament\User\Resources\PemesananSayas\Pages;

use App\Filament\User\Resources\PemesananSayas\PemesananSayaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPemesananSayas extends ListRecords
{
    protected static string $resource = PemesananSayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Buat Pemesanan')
                ->icon('heroicon-o-plus'),
        ];
    }
}