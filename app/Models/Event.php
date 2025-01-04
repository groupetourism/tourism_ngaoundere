<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($event) {
            $event->name = ucwords($event->name, " ");
        });
        static::updating(function ($event) {
            $event->name = ucwords($event->name, " ");
        });
    }
}
