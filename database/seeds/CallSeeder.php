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
            'stat_id' => 1,
            'user_id2' => 6,
            'callinf' =>'Activar office 2019',
        ]);

        Call::create([
            'user_id' => 3,
            'client_id' => 3,
            'stat_id' => 2,
            'user_id2' => 6,
            'callinf' =>'Instal·lar client microgestio',
        ]);

        Call::create([
            'user_id' => 4,
            'client_id' => 1,
            'stat_id' => 3,
            'user_id2' => 6,
            'callinf' =>'Activar windows 10',
        ]);

        Call::create([
            'user_id' => 2,
            'client_id' => 4,
            'stat_id' => 1,
            'user_id2' => 3,
            'callinf' =>'No pot connectar a internet',
        ]);

        Call::create([
            'user_id' => 1,
            'client_id' => 2,
            'stat_id' => 2,
            'user_id2' => 6,
            'callinf' =>'No poden imprimir',
        ]);

        Call::create([
            'user_id' => 2,
            'client_id' => 2,
            'stat_id' => 1,
            'user_id2' => 6,
            'callinf' =>'Revisar error microgestio',
        ]);

        Call::create([
            'user_id' => 2,
            'client_id' => 3,
            'stat_id' => 1,
            'user_id2' => 6,
            'callinf' =>'No connecta microgestio client',
        ]);

        Call::create([
            'user_id' => 7,
            'client_id' => 1,
            'stat_id' => 2,
            'user_id2' => 6,
            'callinf' =>'Actualitzar Microgestio',
        ]);

        Call::create([
            'user_id' => 3,
            'client_id' => 4,
            'stat_id' => 3,
            'user_id2' => 6,
            'callinf' =>'Revisar copia de seguretat',
        ]);

        Call::create([
            'user_id' => 6,
            'client_id' => 2,
            'stat_id' => 3,
            'user_id2' => 2,
            'callinf' =>'Reparar taules microgestio',
        ]);
    }
}
