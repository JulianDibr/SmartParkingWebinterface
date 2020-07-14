<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingTime extends Model {
    protected $fillable = ['open_time', 'close_time', 'user_id'];

    public function days() {
        //Get: Alle Tage die für eine Öffnungszeitraum gelten
        return $this->belongsToMany('App\Day');
    }
}
