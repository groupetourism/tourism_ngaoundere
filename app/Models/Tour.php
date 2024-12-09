<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
