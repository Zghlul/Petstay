<?php

namespace App\Filament\Admin\Resources\Pelanggans\Pages;

use App\Filament\Admin\Resources\Pelanggans\PelangganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPelanggan extends EditRecord
{
    protected static string $resource = PelangganResource::class;

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
        return 'Pelanggan berhasil diperbarui!';
    }

    protected function getDeletedNotificationTitle(): ?string
    {
        return 'Pelanggan berhasil dihapus!';
    }
}