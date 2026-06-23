<?php

namespace App\Filament\User\Resources\HewanSayas\Pages;

use App\Filament\User\Resources\HewanSayas\HewanSayaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHewanSaya extends CreateRecord
{
    protected static string $resource = HewanSayaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Hewan berhasil ditambahkan!';
    }
}