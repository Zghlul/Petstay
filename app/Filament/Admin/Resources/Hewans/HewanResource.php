<?php

namespace App\Filament\Admin\Resources\Hewans;

use App\Filament\Admin\Resources\Hewans\Pages\CreateHewan;
use App\Filament\Admin\Resources\Hewans\Pages\EditHewan;
use App\Filament\Admin\Resources\Hewans\Pages\ListHewans;
use App\Filament\Admin\Resources\Hewans\Schemas\HewanForm;
use App\Filament\Admin\Resources\Hewans\Tables\HewansTable;
use App\Models\Hewan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HewanResource extends Resource
{
    protected static ?string $model = Hewan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $navigationLabel = 'Data Hewan';

    protected static ?string $modelLabel = 'Hewan';

    protected static ?string $pluralModelLabel = 'Data Hewan';

    public static function form(Schema $schema): Schema
    {
        return HewanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HewansTable::configure($table);
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
            'index' => ListHewans::route('/'),
            'create' => CreateHewan::route('/create'),
            'edit' => EditHewan::route('/{record}/edit'),
        ];
    }
}