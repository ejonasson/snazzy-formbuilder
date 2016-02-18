<?php

use Illuminate\Database\Seeder;

class SeedReportsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tempReport = array(
            'form' => 1,
            'reportFields' => array(
                0 => array(
                    'fieldId'    => 11,
                    'reportType' => 'booleanMean',
                    'display'    => 'text',
                    )
                )
            );
        DB::table('reports')->insert([
            'title' => 'Test Report 1',
            'rules' => json_encode($tempReport),
            'form_id' => 1,
        ]);
    }
}
