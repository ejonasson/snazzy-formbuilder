<?php

use Illuminate\Database\Seeder;

class FieldOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_options')->insert([
            'name' => 'joan_rivers',
            'text' => 'Joan Rivers',
            'field_id' => 2
        ]);
        DB::table('field_options')->insert([
            'name' => 'john_smith',
            'text' => 'John Smith',
            'field_id' => 2
        ]);
        DB::table('field_options')->insert([
            'name' => 'erik_jonasson',
            'text' => 'Erik Jonasson',
            'field_id' => 2
        ]);
    }
}
