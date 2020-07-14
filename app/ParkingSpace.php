<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model {
    protected $fillable = ['name', 'device_id', 'group', 'status', 'user_id'];

    public function setStatusAttribute($value) {
        //Überschreiben des Status Attributs eines ParkingSpace
        $this->attributes['status'] = $value;
    }

    public function currentParkdauer() {
        //Aktuelle Parkdauer berechnen
        $start = $this->updated_at; //Letztes update des Parkplatzes
        $timeDiff = now()->diffInMinutes($start); //Differnz in Minuten zwischen letztem Update und jetzt
        return $timeDiff;
    }
}
