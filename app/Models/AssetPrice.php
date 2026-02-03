<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'price',
        'source',
        'recorded_at',
    ];

    protected $casts = [
        'price'       => 'decimal:2',
        'recorded_at' => 'datetime',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }
}
