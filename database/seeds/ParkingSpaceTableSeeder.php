<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingSpaceTableSeeder extends Seeder {
    public function run() {
        DB::table('parking_spaces')->delete();
        DB::table('parking_spaces')->insert([
            [
                'device_id' => 1,
                'name' => 'A01',
                'group' => 'A',
                'status' => 0,
                'user_id' => 1,
            ],
            [
                'device_id' => 2,
                'name' => 'A02',
                'group' => 'A',
                'status' => 1,
                'user_id' => 1,
            ],
            [
                'device_id' => 3,
                'name' => 'B01',
                'group' => 'B',
                'status' => 2,
                'user_id' => 1,
            ],
        ]);
    }
}
