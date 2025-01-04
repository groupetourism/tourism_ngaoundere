<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Room extends Model
{
    protected $guarded = [];
    public function reservations(): MorphMany
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Accommodation::class, 'hotel_id', 'id');
    }
}
