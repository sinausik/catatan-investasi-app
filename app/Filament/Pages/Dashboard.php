<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\PortfolioStats;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Portfolio';
    protected static ?string $title = 'Dashboard Portfolio';

    public function getWidgets(): array
    {
        return [
            PortfolioStats::class,
        ];
    }
}

