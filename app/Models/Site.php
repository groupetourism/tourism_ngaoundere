<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];
    protected $casts = [
        'opening_hours' => 'array',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function isOpenOn($day)
    {
        $hours = $this->opening_hours[$day] ?? null;

        if ($hours === null) {
            return false; // Site is closed on this day
        }
        // Further logic can be added to check current time against opening hours
        $currentTime = now()->format('H:i');
        return $currentTime >= $hours['open'] && $currentTime <= $hours['close'];
    }
}
