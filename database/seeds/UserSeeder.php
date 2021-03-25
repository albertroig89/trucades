<?php

use App\User;
use App\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//SE EXECUTA ABANS LO SEEDER DELS USUARIS QUE EL DE LES PROFESSIONS PER AIXO NO POT CREAR ELS USUARIS

        $techId = DB::select('SELECT id FROM departments WHERE title = "Tecnic"');
        $progId = Department::where('title', 'Programador')->value('id');
        $admid = Department::where('title', 'Administracio')->value('id');
        $comId = Department::where('title', 'Comercial')->value('id');

        dd($techId[0]->id);

        User::create([
            'name' => 'Albert Roig',
            'email' => 'albert@microdelta.net',
            'password' => bcrypt('laravel'),
            'Department_id' => $techId[0]->id,
            'is_admin' => true
        ]);


        User::create([
            'name' => 'Joel Valor',
            'email' => 'joel@microdelta.net',
            'password' => bcrypt('laravel2'),
            'Department_id' => $techId[0]->id,
        ]);

        User::create([
            'name' => 'Josep Castells',
            'email' => 'josep@microdelta.net',
            'password' => bcrypt('laravel3'),
            'Department_id' => $techId[0]->id,
        ]);

        User::create([
            'name' => 'Cristina Esquerre',
            'email' => 'administracio@microdelta.net',
            'password' => bcrypt('laravel4'),
            'Department_id' => $admid[0]->id,
        ]);

        User::create([
            'name' => 'Manel Bel',
            'email' => 'comercial@microdelta.net',
            'password' => bcrypt('laravel5'),
            'Department_id' => $comId[0]->id,
        ]);

        User::create([
            'name' => 'Juan Valor',
            'email' => 'soft@microdelta.net',
            'password' => bcrypt('pass1234'),
            'Department_id' => $progId[0]->id,
        ]);

    }
}
