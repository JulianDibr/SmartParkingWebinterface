<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
