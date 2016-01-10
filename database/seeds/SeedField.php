<?php

use Illuminate\Database\Seeder;

class SeedField extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            'name' => 'Test Field 1',
            'description' => 'Blabla Ipsum Bla Bla bla',
            'type' => 'text',
            'form_id' => 1
        ]);
        DB::table('fields')->insert([
            'name' => 'Your Name',
            'description' => 'Select your name',
            'type' => 'select',
            'form_id' => 1
        ]);
        DB::table('fields')->insert([
            'name' => 'Number',
            'description' => 'insert a number',
            'type' => 'number',
            'form_id' => 1
        ]);
    }
}
