<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Hall extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hall_rows(): HasMany
    {
        return $this->hasMany(HallRow::class);
    }

    public function columns(): HasManyThrough
    {
        return $this->hasManyThrough(HallColumn::class, HallRow::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(FilmSchedule::class);
    }
}
