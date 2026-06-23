<?php

namespace App\Filament\Admin\Resources\Hewans\Pages;

use App\Filament\Admin\Resources\Hewans\HewanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHewan extends CreateRecord
{
    protected static string $resource = HewanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Hewan berhasil ditambahkan!';
    }
}