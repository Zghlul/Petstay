<?php

namespace App\Filament\Admin\Resources\Kamars;

use App\Filament\Admin\Resources\Kamars\Pages\CreateKamar;
use App\Filament\Admin\Resources\Kamars\Pages\EditKamar;
use App\Filament\Admin\Resources\Kamars\Pages\ListKamars;
use App\Filament\Admin\Resources\Kamars\Schemas\KamarForm;
use App\Filament\Admin\Resources\Kamars\Tables\KamarsTable;
use App\Models\Kamar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KamarResource extends Resource
{
    protected static ?string $model = Kamar::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?string $navigationLabel = 'Kamar';

    protected static ?string $modelLabel = 'Kamar';

    protected static ?string $pluralModelLabel = 'Data Kamar';

    public static function form(Schema $schema): Schema
    {
        return KamarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KamarsTable::configure($table);
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
            'index' => ListKamars::route('/'),
            'create' => CreateKamar::route('/create'),
            'edit' => EditKamar::route('/{record}/edit'),
        ];
    }
}