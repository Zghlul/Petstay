<?php

namespace App\Filament\Admin\Resources\Layanans\Pages;

use App\Filament\Admin\Resources\Layanans\LayananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLayanan extends EditRecord
{
    protected static string $resource = LayananResource::class;

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
        return 'Layanan berhasil diperbarui!';
    }

    protected function getDeletedNotificationTitle(): ?string
    {
        return 'Layanan berhasil dihapus!';
    }
}