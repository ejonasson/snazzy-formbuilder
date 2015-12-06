<?php

use Illuminate\Database\Seeder;

class SeedForm extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert([
            'name' => 'Test Form 1',
            'description' => 'Lorem Ipsum Bla Bla bla',
            'user_id' => 1,
        ]);
    }
}
