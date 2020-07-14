<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parkingSpaces() {
        ///Get: Parkplätze die zu dem eingeloggten Nutzer gehören
        return $this->hasMany('App\ParkingSpace');
    }

    public function parkingTimes() {
        ///Get: Parkzeiten die zu dem eingeloggten Nutzer gehören
        return $this->hasOne('App\ParkingTime');
    }

    public function settings() {
        ///Get: Einstellungen des Nutzers
        return $this->hasOne('App\settings');
    }
}
