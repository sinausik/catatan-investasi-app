<?php
namespace App\Services;

use App\Models\Asset;
use App\Models\AssetPrice;

class AssetPriceUpdater
{
    public function __construct(
        protected YahooFinanceService $yahoo
    ) {}

    public function updateForAsset(Asset $asset): void
    {
        if (!$asset->code || $asset->price_source !== 'yahoo') {
            return;
        }

        $price = $this->yahoo->getLatestPrice($asset->code);

        if ($price === null) {
            return;
        }

        AssetPrice::updateOrCreate(
            [
                'asset_id' => $asset->id,
            ],
            [
                'price' => $price,
                'source' => 'yahoo',
                'recorded_at' => now(),
            ]
        );
    }

    public function updateAll(): void
    {
        Asset::query()
            ->whereNotNull('code')
            ->where('price_source', 'yahoo')
            ->each(fn (Asset $asset) => $this->updateForAsset($asset));
    }
}
