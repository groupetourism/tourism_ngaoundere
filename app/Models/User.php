<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['is_admin'];

    protected $hidden = ['password'];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->lastname = ucwords($user->lastname, " ");
            $user->firstname = ucwords($user->firstname, " ");
        });
        static::updating(function ($user) {
            $user->lastname = ucwords($user->lastname, " ");
            $user->firstname = ucwords($user->firstname, " ");
        });
    }
}
