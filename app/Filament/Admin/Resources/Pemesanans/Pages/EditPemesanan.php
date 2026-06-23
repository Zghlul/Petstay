<?php

namespace App\Filament\Admin\Resources\Pemesanans\Pages;

use App\Filament\Admin\Resources\Pemesanans\PemesananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPemesanan extends EditRecord
{
    protected static string $resource = PemesananResource::class;

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
        return 'Pemesanan berhasil diperbarui!';
    }

    protected function getDeletedNotificationTitle(): ?string
    {
        return 'Pemesanan berhasil dihapus!';
    }
}
