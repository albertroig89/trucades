<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Albert Roig',
            'email' => 'albert@microdelta.net',
            'password' => bcrypt('laravel'),
            'is_admin' => true
        ]);

        /*DB::insert('INSERT INTO users (name, email, password, profession_id) VALUES ("Laia Barco", "laiayniska@gmail.com", "12345678", "2")');*/
        //EXERCICI TEMA 13 FET EN SQL

        DB::table('users')->insert([
            'name' => 'Joel Valor',
            'email' => 'joel@microdelta.net',
            'password' => bcrypt('laravel2'),
        ]); //EXERCICI TEMA 13 FET EN CONSTRUCTOR DE CONSULTES DE LARAVEL

        User::create([
            'name' => 'Josep Castells',
            'email' => 'josep@microdelta.net',
            'password' => bcrypt('laravel3'),
        ]);

        User::create([
            'name' => 'Cristina Esquerre',
            'email' => 'administracio@microdelta.net',
            'password' => bcrypt('laravel4'),
        ]);

        factory(User::class)->create([  //Crea usuari en nom aleatori i les dades que yo li paso
            'name' => 'Juan Valor',
            'email' => 'soft@microdelta.net',
            'password' => bcrypt('pass1234'),
        ]);

    }
}
