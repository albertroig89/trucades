<?php

use Illuminate\Database\Seeder;
use App\Call;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Call::create([
            'user_id' => 1,
            'client_id' => 2,
            'status_id' => 1,
            'user_id2' => 4,
            'callinf' =>'Activar office 2019',
        ]);

        Call::create([
            'user_id' => 3,
            'client_id' => 3,
            'status_id' => 2,
            'user_id2' => 4,
            'callinf' =>'Instal·lar client microgestio',
        ]);

        Call::create([
            'user_id' => 1,
            'client_id' => 1,
            'status_id' => 3,
            'user_id2' => 4,
            'callinf' =>'Activar windows 10',
        ]);

        Call::create([
            'user_id' => 2,
            'client_id' => 4,
            'status_id' => 1,
            'user_id2' => 4,
            'callinf' =>'No pot connectar a internet',
        ]);
    }
}
