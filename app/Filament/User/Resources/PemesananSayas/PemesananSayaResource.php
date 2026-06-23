<?php

namespace App\Filament\User\Resources\PemesananSayas;

use App\Filament\User\Resources\PemesananSayas\Pages\CreatePemesananSaya;
use App\Filament\User\Resources\PemesananSayas\Pages\EditPemesananSaya;
use App\Filament\User\Resources\PemesananSayas\Pages\ListPemesananSayas;
use App\Filament\User\Resources\PemesananSayas\Schemas\PemesananSayaForm;
use App\Filament\User\Resources\PemesananSayas\Tables\PemesananSayasTable;
use App\Models\Pemesanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PemesananSayaResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Pemesanan Saya';

    protected static ?string $modelLabel = 'Pemesanan';

    protected static ?string $pluralModelLabel = 'Pemesanan Saya';

    // 🔥 FILTER: Hanya menampilkan pemesanan dari hewan milik user yang login
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('hewan', fn($q) => $q->where('id_pelanggan', auth('pelanggan')->id()));
    }

    public static function form(Schema $schema): Schema
    {
        return PemesananSayaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PemesananSayasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPemesananSayas::route('/'),
            'create' => CreatePemesananSaya::route('/create'),
            'edit' => EditPemesananSaya::route('/{record}/edit'),
        ];
    }
}
