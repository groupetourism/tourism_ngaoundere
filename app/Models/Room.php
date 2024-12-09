<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    public function reservations(): MorphMany
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
}
