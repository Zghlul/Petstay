<?php

namespace App\Filament\Admin\Resources\Layanans\Pages;

use App\Filament\Admin\Resources\Layanans\LayananResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLayanan extends CreateRecord
{
    protected static string $resource = LayananResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Layanan berhasil ditambahkan!';
    }
}