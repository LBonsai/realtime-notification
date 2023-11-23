<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_enable_notification'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function notifications()
    {
        return $this->belongsToMany(Notification::class)->withTimestamps();
    }
}
