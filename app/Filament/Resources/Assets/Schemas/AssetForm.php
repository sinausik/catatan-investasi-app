<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('asset_category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->default(null),
                TextInput::make('currency')
                    ->required()
                    ->default('IDR'),
                Select::make('price_source')
                    ->options([
                        'manual' => 'Manual',
                        'yahoo' => 'Yahoo Finance',
                        'treasury' => 'Treasury.id',
                    ])
                    ->required(),
                TextInput::make('manual_price')
                    ->numeric()
                    ->default(null)
                    ->prefix('Rp'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
