<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sites(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function accomodations(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Headquarter::class);
    }
    public function headquarters(): HasMany
    {
        return $this->hasMany(Headquarter::class);
    }
}
