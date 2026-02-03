<?php

namespace App\Filament\Resources\AssetPrices\Pages;

use App\Filament\Resources\AssetPrices\AssetPriceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssetPrices extends ListRecords
{
    protected static string $resource = AssetPriceResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
