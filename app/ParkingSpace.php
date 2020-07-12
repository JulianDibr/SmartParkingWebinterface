<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model {
    protected $fillable = ['name', 'device_id', 'group', 'status', 'user_id'];

    public function setStatusAttribute($value) {
        $this->attributes['status'] = $value;
    }

    public function currentParkdauer() {
        $start = $this->updated_at;
        $timeDiff = now()->diffInMinutes($start);
        return $timeDiff;
    }
}
