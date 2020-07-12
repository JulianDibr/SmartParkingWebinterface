<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder {
    public function run() {
        DB::table('settings')->delete();
        DB::table('settings')->insert([
            [
                'max_parkingtime' => '00:45',
                'meassure_distance' => '45',
                'user_id' => 1,
            ],
        ]);
    }
}
