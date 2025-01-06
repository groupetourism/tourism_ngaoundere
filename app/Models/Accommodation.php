<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Accommodation extends Model
{
    protected $guarded = [];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
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
