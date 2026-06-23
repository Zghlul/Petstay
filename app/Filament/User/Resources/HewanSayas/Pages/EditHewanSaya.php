<?php

namespace App\Filament\User\Resources\HewanSayas\Pages;

use App\Filament\User\Resources\HewanSayas\HewanSayaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHewanSaya extends EditRecord
{
    protected static string $resource = HewanSayaResource::class;

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