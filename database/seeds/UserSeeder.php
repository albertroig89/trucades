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
        $techId = DB::table('departments')->where('title', 'Tecnic')->value('id');

        $progId = Department::where('title', 'Programador')->value('id');
        $admid = Department::where('title', 'Administracio')->value('id');
        $comId = Department::where('title', 'Comercial')->value('id');


        User::create([
            'name' => 'Albert Roig',
            'email' => 'albert@microdelta.net',
            'password' => bcrypt('laravel'),
            'Department_id' => $techId,
            'is_admin' => true
        ]);

        /*DB::insert('INSERT INTO users (name, email, password, profession_id) VALUES ("Laia Barco", "laiayniska@gmail.com", "12345678", "2")');*/
        //EXERCICI TEMA 13 FET EN SQL

        DB::table('users')->insert([
            'name' => 'Joel Valor',
            'email' => 'joel@microdelta.net',
            'password' => bcrypt('laravel2'),
            'Department_id' => $techId,
        ]); //EXERCICI TEMA 13 FET EN CONSTRUCTOR DE CONSULTES DE LARAVEL

        User::create([
            'name' => 'Josep Castells',
            'email' => 'josep@microdelta.net',
            'password' => bcrypt('laravel3'),
            'Department_id' => $techId,
        ]);

        User::create([
            'name' => 'Cristina Esquerre',
            'email' => 'administracio@microdelta.net',
            'password' => bcrypt('laravel4'),
            'Department_id' => $admid,
        ]);

        User::create([
            'name' => 'Manel Bel',
            'email' => 'comercial@microdelta.net',
            'password' => bcrypt('laravel5'),
            'Department_id' => $comId,
        ]);

        factory(User::class)->create([  //Crea usuari en nom aleatori i les dades que yo li paso
            'name' => 'Juan Valor',
            'email' => 'soft@microdelta.net',
            'password' => bcrypt('pass1234'),
            'Department_id' => $progId,
        ]);

    }
}
