<?php

namespace App\Filament\Resources\AssetPrices\Tables;

use App\Services\AssetPriceUpdater;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetPricesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                Action::make('updatePrices')
                    ->label('Update Price')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function () {
                        app(AssetPriceUpdater::class)->updateAll();
                        Notification::make()
                            ->title('Asset prices updated')
                            ->success()
                            ->send();
                }),
            ])
            ->columns([
                TextColumn::make('asset.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('asset.code')
                    ->searchable(),
                TextColumn::make('price')
                    ->money(fn ($record) => $record->asset->currency ?? 'IDR'),
                TextColumn::make('source')
                    ->searchable(),
                TextColumn::make('recorded_at')
                    ->dateTime('d M Y H:m:s'),
            ])
            ->filters([
                //
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
