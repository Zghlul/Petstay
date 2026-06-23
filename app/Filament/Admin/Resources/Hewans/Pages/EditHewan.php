<?php

namespace App\Filament\Admin\Resources\Hewans\Pages;

use App\Filament\Admin\Resources\Hewans\HewanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHewan extends EditRecord
{
    protected static string $resource = HewanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Hewan berhasil diperbarui!';
    }

    protected function getDeletedNotificationTitle(): ?string
    {
        return 'Hewan berhasil dihapus!';
    }
}