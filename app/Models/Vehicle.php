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

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($vehicle) {
            $vehicle->provider_name = ucwords($vehicle->provider_name, " ");
        });
        static::updating(function ($vehicle) {
            $vehicle->provider_name = ucwords($vehicle->provider_name, " ");
        });
    }
}
