<?php

namespace App\Filament\User\Resources\PemesananSayas\Pages;

use App\Filament\User\Resources\PemesananSayas\PemesananSayaResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePemesananSaya extends CreateRecord
{
    protected static string $resource = PemesananSayaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pemesanan berhasil dibuat!';
    }
}