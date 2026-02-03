<?php
namespace App\Services;

use App\Models\Investment;

class PortfolioService
{
    public function totalInvested(): float
    {
        return Investment::selectRaw('SUM(buy_price * quantity) as total')
        ->value('total') ?? 0;
    }

    public function totalCurrentInvested(): float
    {
        return Investment::selectRaw('SUM(buy_price * quantity) as totalCurrent')
        ->where('status','hold')
        ->value('totalCurrent') ?? 0;
    }

    public function totalRealizedInvested(): float
    {
        return Investment::selectRaw('SUM((sell_price - buy_price) * quantity) as total')
        ->value('total') ?? 0;
    }

    public function totalCurrentValue(): float
    {
        return Investment::with('asset.prices')->get()->sum(function ($inv) {

            // SOLD → pakai harga jual
            if ($inv->status === 'sold') {
                return ($inv->sold_price ?? 0) * $inv->quantity;
            }

            // HOLD → pakai harga terbaru
            $latestPrice = $inv->asset->latestPrice();
                // ->prices()
                // ->latest('recorded_at')
                // ->value('price');

            return $latestPrice
                ? $latestPrice * $inv->quantity
                : 0;
        });
    }

    public function totalProfit(): float
    {
        // floating profit
        return $this->totalCurrentValue() - $this->totalCurrentInvested();
    }

    public function totalProfitPercent(): float
    {
        $invested = $this->totalCurrentValue();

        if ($invested == 0) {
            return 0;
        }

        return ($this->totalProfit() / $invested) * 100;
    }
}
