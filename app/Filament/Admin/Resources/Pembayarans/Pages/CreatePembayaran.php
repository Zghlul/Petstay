<?php

namespace App\Filament\Admin\Resources\Pembayarans\Pages;

use App\Filament\Admin\Resources\Pembayarans\PembayaranResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePembayaran extends CreateRecord
{
    protected static string $resource = PembayaranResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pembayaran berhasil ditambahkan!';
    }
}