<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysTableSeeder extends Seeder {
    public function run() {
        DB::table('days')->delete();
        DB::table('days')->insert([
            [
                'day' => 1,
                'name' => 'Montag',
            ],
            [
                'day' => 2,
                'name' => 'Dienstag',
            ],
            [
                'day' => 3,
                'name' => 'Mittwoch',
            ],
            [
                'day' => 4,
                'name' => 'Donnerstag',
            ],
            [
                'day' => 5,
                'name' => 'Freitag',
            ],
            [
                'day' => 6,
                'name' => 'Samstag',
            ],
            [
                'day' => 7,
                'name' => 'Sonntag',
            ],
        ]);
    }
}
