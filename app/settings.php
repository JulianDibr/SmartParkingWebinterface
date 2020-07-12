<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    protected $fillable = ['max_parkingtime', 'meassure_distance'];
}
