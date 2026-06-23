<?php

namespace App\Filament\User\Resources\HewanSayas;

use App\Filament\User\Resources\HewanSayas\Pages\CreateHewanSaya;
use App\Filament\User\Resources\HewanSayas\Pages\EditHewanSaya;
use App\Filament\User\Resources\HewanSayas\Pages\ListHewanSayas;
use App\Filament\User\Resources\HewanSayas\Schemas\HewanSayaForm;
use App\Filament\User\Resources\HewanSayas\Tables\HewanSayasTable;
use App\Models\Hewan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HewanSayaResource extends Resource
{
    protected static ?string $model = Hewan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $navigationLabel = 'Hewan Saya';

    protected static ?string $modelLabel = 'Hewan';

    protected static ?string $pluralModelLabel = 'Hewan Saya';

    // 🔥 FILTER: Hanya menampilkan hewan milik user yang login
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('id_pelanggan', auth('pelanggan')->id());
    }

    public static function form(Schema $schema): Schema
    {
        return HewanSayaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HewanSayasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHewanSayas::route('/'),
            'create' => CreateHewanSaya::route('/create'),
            'edit' => EditHewanSaya::route('/{record}/edit'),
        ];
    }
}