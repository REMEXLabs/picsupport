<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => env('DEV_NAME'),
            'email' => env('DEV_EMAIL'),
            'password' => bcrypt(env('DEV_PASSWORD')),
        ]);
    }
}
