<?php

namespace App\Filament\Resources\Investments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class InvestmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('buy_date', 'desc')
            ->columns([
                TextColumn::make('platform.name')
                    ->label('Platform')
                    ->sortable(),
                TextColumn::make('asset.code')
                    ->label('Code')
                    ->searchable(),
                TextColumn::make('buy_price')
                    ->label('Buy')
                    ->money(fn ($record) => $record->asset->currency ?? 'IDR'),
                TextColumn::make('now_price')
                    ->label('Now')
                    ->money(fn ($record) => $record->asset->currency ?? 'IDR'),                
                TextColumn::make('buy_date')
                    ->date('d M Y'),
                TextColumn::make('asset_value')
                    ->label('Asset Value')
                    ->state(function ($record) {
                        return $record->status === 'sold'
                        ? $record->realized_asset_value
                        : $record->asset_value;
                    })
                    ->money(fn ($record) => $record->asset->currency ?? 'IDR'),
                TextColumn::make('asset_gain_percent')
                    ->label('Gain %')
                    ->state(function ($record) {
                        return $record->status === 'sold'
                        ? $record->realized_asset_gain_percent
                        : $record->asset_gain_percent;
                    })
                    ->formatStateUsing(fn ($state) =>
                        $state !== null ? number_format($state, 2) : '—'
                    )
                    ->suffix('%')
                    ->color(fn ($state) => $state >= 0 ? 'success' : 'danger'),
                TextColumn::make('profit')
                    ->label('Profit')
                    ->state(function ($record) {
                        return $record->status === 'sold'
                            ? $record->realized_profit
                            : $record->floating_profit;
                    })
                    ->money(fn ($record) => $record->asset?->currency ?? 'IDR')
                    ->color(fn ($state) => $state >= 0 ? 'success' : 'danger'),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'hold',
                        'success' => 'sold',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'hold' => 'Hold',
                        'sold' => 'Sold',
                    ]),
                SelectFilter::make('asset')
                    ->relationship('asset', 'code'),
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
