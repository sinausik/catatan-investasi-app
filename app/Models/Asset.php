<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_category_id',
        'name',
        'code',
        'currency',
        'price_source',
        'manual_price',
        'is_active',
    ];

    protected $casts = [
        'manual_price' => 'decimal:2',
        'is_active'    => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(AssetCategory::class, 'asset_category_id');
    }

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(AssetPrice::class);
    }

    public function latestPrice(): ?float
    {
        if ($this->price_source === 'manual') {
            return $this->manual_price;
        }

        return $this->prices()
            ->latest('recorded_at')
            ->value('price');
    }

    public function getNowPriceAttribute(): ?float
    {
        return $this->latestPrice();
    }
}
