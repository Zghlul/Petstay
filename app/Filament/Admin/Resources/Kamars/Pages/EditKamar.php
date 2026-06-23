<?php

namespace App\Filament\Admin\Resources\Kamars\Pages;

use App\Filament\Admin\Resources\Kamars\KamarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKamar extends EditRecord
{
    protected static string $resource = KamarResource::class;

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
        return 'Kamar berhasil diperbarui!';
    }

    protected function getDeletedNotificationTitle(): ?string
    {
        return 'Kamar berhasil dihapus!';
    }
}
