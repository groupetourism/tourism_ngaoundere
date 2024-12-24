<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $guarded = [];

    public function reservations(): MorphMany
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($accommodation) {
            $accommodation->name = ucwords($accommodation->name, " ");
        });
        static::updating(function ($accommodation) {
            $accommodation->name = ucwords($accommodation->name, " ");
        });
    }
}
