<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingTimesTableSeeder extends Seeder {
    public function run() {
        DB::table('parking_times')->delete();
        DB::table('parking_times')->insert([
            [
                'open_time' => '09:00',
                'close_time' => '21:00',
                'user_id' => 1
            ],
        ]);
    }
}
