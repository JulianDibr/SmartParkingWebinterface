<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    protected $fillable = ['name', 'device_id', 'status'];
}
