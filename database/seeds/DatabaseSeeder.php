<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(ParkingSpaceTableSeeder::class);
        $this->call(ParkingTimesTableSeeder::class);

        //Pivot
        $this->call(DayParkingTimeTableSeeder::class);
    }
}
