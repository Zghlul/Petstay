<?php

namespace App\Filament\Admin\Resources\Pemesanans\Pages;

use App\Filament\Admin\Resources\Pemesanans\PemesananResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePemesanan extends CreateRecord
{
    protected static string $resource = PemesananResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pemesanan berhasil ditambahkan!';
    }
}