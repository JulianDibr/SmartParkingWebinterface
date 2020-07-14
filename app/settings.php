<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class settings extends Model {
    protected $fillable = ['max_parkingtime', 'meassure_distance'];

    public function getMaxParkingtimeinMin() {
        $max = $this->max_parkingtime; //Maximale Parkdauer aus Einstellungen auslesen
        $minutes = Carbon::parse('00:00:00')->diffInMinutes($max); //Umrechnung in einen int zur Weiterverarbeitung
        return $minutes;
    }
}
