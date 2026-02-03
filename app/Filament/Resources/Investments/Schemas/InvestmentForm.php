<?php

namespace App\Filament\Resources\Investments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InvestmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Asset Information')
                ->schema([
                    Select::make('platform_id')
                        ->relationship('platform', 'name')
                        ->required(),
                    Select::make('asset_id')
                        ->relationship('asset', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                ])
                ->columns(2),

                Section::make('Buy Information')
                ->schema([
                    DatePicker::make('buy_date')
                    ->required(),
                    TextInput::make('buy_price')
                        ->required()
                        ->numeric(),
                    TextInput::make('quantity')
                        ->required()
                        ->numeric()
                        ->prefix('Lot'),
                ])
                ->columns(3),

                Section::make('Status & Notes')
                ->schema([
                    Select::make('status')
                    ->options(['hold' => 'Hold', 'sold' => 'Sold'])
                    ->default('hold')
                    ->required(),
                    Textarea::make('notes')
                        ->default(null)
                        ->columnSpanFull(),
                ]),

                Section::make('Sell Information')
                ->description('Will be available if status updated to Sold.')
                ->schema([
                    DatePicker::make('sell_date')
                    ->visible(fn ($get) => $get('status') === 'sold'),
                    TextInput::make('sell_price')
                        ->numeric()
                        ->default(null)
                        ->visible(fn ($get) => $get('status') === 'sold'),
                ]),
            ]);
    }
}
