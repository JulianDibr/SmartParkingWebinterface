<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model {
    public function parkingTimes() {
        //Get: Alle Parkzeiten die zu einem Tag gehören
        return $this->belongsToMany('App\ParkingTime');
    }
}
