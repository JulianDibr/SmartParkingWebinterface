<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model {
    public function parkingTimes() {
        return $this->belongsToMany('App\ParkingTime');
    }
}
