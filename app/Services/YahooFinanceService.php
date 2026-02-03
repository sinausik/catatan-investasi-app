<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YahooFinanceService
{
    public function getLatestPrice(string $code): ?float
    {
        $url = "https://query1.finance.yahoo.com/v8/finance/chart/{$code}";

        $response = Http::timeout(10)->get($url);

        if (! $response->successful()) {
            return null;
        }

        return data_get(
            $response->json(),
            'chart.result.0.meta.regularMarketPrice'
        );
    }
}
