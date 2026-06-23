<?php

namespace App\Filament\Admin\Resources\Hewans\Pages;

use App\Filament\Admin\Resources\Hewans\HewanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHewans extends ListRecords
{
    protected static string $resource = HewanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Hewan')
                ->icon('heroicon-o-plus')
                ->modalHeading('Tambah Hewan Baru'),
        ];
    }
}