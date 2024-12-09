<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
