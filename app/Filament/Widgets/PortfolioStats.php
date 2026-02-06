<?php

namespace App\Filament\Widgets;

use App\Services\PortfolioService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortfolioStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $portfolio = app(PortfolioService::class);

        return [
            Stat::make('Current Invested', number_format($portfolio->totalCurrentInvested(),2,',','.'))
                ->description('Capital'),

            Stat::make('Portfolio', number_format($portfolio->totalCurrentValue(),2,',','.'))
                ->description('Capital gain'),

            Stat::make('Floating Profit', number_format($portfolio->totalProfit(),2,',','.'))
                ->description(number_format($portfolio->totalProfitPercent(), 2) . '% current')
                ->descriptionIcon($portfolio->totalProfit() >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($portfolio->totalProfit() >= 0 ? 'success' : 'danger'),

            Stat::make('Take Profit', number_format($portfolio->totalRealizedInvested(),2,',','.'))
                ->description('Realized Profit')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}

