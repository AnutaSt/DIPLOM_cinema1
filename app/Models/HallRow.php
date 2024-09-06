<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HallRow extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function columns(): HasMany
    {
        return $this->hasMany(HallColumn::class);
    }
}
