<?php

namespace App\Filament\Admin\Resources\Pemesanans;

use App\Filament\Admin\Resources\Pemesanans\Pages\CreatePemesanan;
use App\Filament\Admin\Resources\Pemesanans\Pages\EditPemesanan;
use App\Filament\Admin\Resources\Pemesanans\Pages\ListPemesanans;
use App\Filament\Admin\Resources\Pemesanans\Schemas\PemesananForm;
use App\Filament\Admin\Resources\Pemesanans\Tables\PemesanansTable;
use App\Models\Pemesanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PemesananResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static ?string $navigationLabel = 'Pemesanan';

    protected static ?string $modelLabel = 'Pemesanan';

    protected static ?string $pluralModelLabel = 'Data Pemesanan';

    public static function form(Schema $schema): Schema
    {
        return PemesananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PemesanansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPemesanans::route('/'),
            'create' => CreatePemesanan::route('/create'),
            'edit' => EditPemesanan::route('/{record}/edit'),
        ];
    }
}