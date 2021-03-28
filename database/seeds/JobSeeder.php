<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'user_id' => 2,
            'client_id' =>3,
            'job' => 'Activar office'
        ]);
        Job::create([
            'job' => 'Activar office'
        ]);
    }
}
