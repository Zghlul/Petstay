<?php

namespace App\Filament\User\Resources\HewanSayas\Pages;

use App\Filament\User\Resources\HewanSayas\HewanSayaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHewanSayas extends ListRecords
{
    protected static string $resource = HewanSayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Hewan')
                ->icon('heroicon-o-plus'),
        ];
    }
}