<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayParkingTimeTableSeeder extends Seeder {
    public function run() {
        DB::table('day_parking_time')->delete();
        DB::table('day_parking_time')->insert([
            [
                'day_id' => 1,
                'parking_time_id' => 1,
            ],
            [
                'day_id' => 2,
                'parking_time_id' => 1,
            ],
        ]);
    }
}
