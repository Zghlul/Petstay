<?php

namespace App\Filament\Admin\Resources\Kamars\Pages;

use App\Filament\Admin\Resources\Kamars\KamarResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKamar extends CreateRecord
{
    protected static string $resource = KamarResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Kamar berhasil ditambahkan!';
    }
}
