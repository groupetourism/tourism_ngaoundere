<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];
    public function reservations(): MorphMany
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
