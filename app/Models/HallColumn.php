<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HallColumn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hall(): BelongsTo
    {
        return $this->belongsTo(HallRow::class);
    }
}
