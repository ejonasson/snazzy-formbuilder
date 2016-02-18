<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SeedTestUser::class);
        $this->call(SeedForm::class);
        $this->call(SeedField::class);
        $this->call(FieldOptionSeeder::class);
        $this->call(SeedReportsTable::class);
        Model::reguard();
    }
}
