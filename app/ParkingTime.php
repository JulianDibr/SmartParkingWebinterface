<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingTime extends Model
{
    protected $fillable = ['open_time', 'close_time'];
}
