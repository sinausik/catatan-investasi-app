<?php

namespace App\Filament\Resources\AssetPrices\Pages;

use App\Filament\Resources\AssetPrices\AssetPriceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAssetPrice extends EditRecord
{
    protected static string $resource = AssetPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
