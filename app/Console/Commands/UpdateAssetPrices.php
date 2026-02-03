<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asset;
use App\Models\AssetPrice;
use App\Services\YahooFinanceService;

class UpdateAssetPrices extends Command
{
    protected $signature = 'assets:update-prices';
    protected $description = 'Fetch latest prices from Yahoo Finance';

    public function handle(YahooFinanceService $yahoo)
    {
        $this->info('Updating asset prices...');

        Asset::query()
            ->where('price_source', 'yahoo')
            ->whereNotNull('code')
            ->where('is_active', true)
            ->each(function ($asset) use ($yahoo) {

                $price = $yahoo->getLatestPrice($asset->code);

                if (! $price) {
                    $this->warn("Failed: {$asset->code}");
                    return;
                }

                AssetPrice::updateOrCreate(
                    ['asset_id'   => $asset->id],
                    [
                        'price'      => $price,
                        'source'     => 'yahoo',
                        'recorded_at'=> now(),
                    ]
                );

                $this->info("Updated {$asset->code}: {$price}");
            });

        $this->info('Done.');
    }
}
