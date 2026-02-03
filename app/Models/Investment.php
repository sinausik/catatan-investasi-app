<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform_id',
        'asset_id',
        'buy_date',
        'buy_price',
        'quantity',
        'sell_date',
        'sell_price',
        'status',
        'notes',
    ];

    protected $casts = [
        'buy_date'   => 'date',
        'sell_date'  => 'date',
        'buy_price'  => 'decimal:2',
        'sell_price' => 'decimal:2',
        'quantity'   => 'decimal:8',
    ];

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function getNowPriceAttribute(): ?float
    {
        return $this->asset?->now_price;
    }

    public function getAssetValueAttribute(): ?float
    {
        if (!$this->now_price) return null;

        return $this->now_price * $this->quantity;
    }

    public function getFloatingProfitAttribute(): float
    {
        if ($this->status !== 'hold' || !$this->now_price) {
            return 0;
        }

        return ($this->now_price - $this->buy_price) * $this->quantity;
    }

    public function getRealizedProfitAttribute(): float
    {
        if ($this->status !== 'sold' || !$this->sell_price) {
            return 0;
        }

        return ($this->sell_price - $this->buy_price) * $this->quantity;
    }

    public function getAssetGainPercentAttribute(): ?float
    {
        if (!$this->now_price) return null;

        return (($this->now_price - $this->buy_price) / $this->buy_price) * 100;
    }

    public function getRealizedAssetGainPercentAttribute(): ?float
    {
        if ($this->status !== 'sold' || !$this->sell_price) {
            return 0;
        }

        return (($this->sell_price - $this->buy_price) / $this->buy_price) * 100;
    }

    public function getRealizedAssetValueAttribute(): ?float
    {
        if ($this->status !== 'sold' || !$this->sell_price) {
            return 0;
        }

        return $this->sell_price * $this->quantity;
    }
}
