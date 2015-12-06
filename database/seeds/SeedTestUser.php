<?php

use Illuminate\Database\Seeder;

class SeedTestUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ejonasson',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
