<?php

namespace App\Filament\Resources\AssetPrices;

use App\Filament\Resources\AssetPrices\Pages\CreateAssetPrice;
use App\Filament\Resources\AssetPrices\Pages\EditAssetPrice;
use App\Filament\Resources\AssetPrices\Pages\ListAssetPrices;
use App\Filament\Resources\AssetPrices\Schemas\AssetPriceForm;
use App\Filament\Resources\AssetPrices\Tables\AssetPricesTable;
use App\Models\AssetPrice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AssetPriceResource extends Resource
{
    protected static ?string $model = AssetPrice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';
    protected static ?string $recordTitleAttribute = 'Asset Price';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return AssetPriceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetPricesTable::configure($table);
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
            'index' => ListAssetPrices::route('/'),
            // 'create' => CreateAssetPrice::route('/create'),
            // 'edit' => EditAssetPrice::route('/{record}/edit'),
        ];
    }
}
