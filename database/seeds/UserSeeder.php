<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'name' => 'Julian',
                'email' => 'JulianDibr@gmail.com',
                'password' => bcrypt('12345678'),
            ],
        ]);
    }
}
