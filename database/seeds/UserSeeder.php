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

//        $techId = DB::select('SELECT id FROM departments WHERE title = "Tecnic"');
//        $progId = DB::select('SELECT id FROM departments WHERE title = "Programador"');
//        $admid = DB::select('SELECT id FROM departments WHERE title = "Administracio"');
//        $comId = DB::select('SELECT id FROM departments WHERE title = "Comercial"');

        $techId = Department::where('title', 'Tecnic')->value('id');
        $progId = Department::where('title', 'Programador')->value('id');
        $admId = Department::where('title', 'Administracio')->value('id');
        $comId = Department::where('title', 'Comercial')->value('id');
        $globId = Department::where('title', 'Global')->value('id');


        User::create([
            'name' => 'Global',
            'email' => 'global@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $globId,
        ]);

        User::create([
            'name' => 'Albert Roig',
            'email' => 'albert@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $techId,
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Jordi Espinoso',
            'email' => 'sat@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $techId,
        ]);

        User::create([
            'name' => 'Joel Galindo',
            'email' => 'joel@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $techId,
        ]);

        User::create([
            'name' => 'Josep Costelles',
            'email' => 'josep@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $techId,
        ]);

        User::create([
            'name' => 'Cristina Dretera',
            'email' => 'administracio@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $admId,
        ]);

        User::create([
            'name' => 'Manel Pel',
            'email' => 'comercial@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $comId,
        ]);

        User::create([
            'name' => 'Juan Galindo',
            'email' => 'soft@microdelta.net',
            'password' => bcrypt('MicAmposta43'),
            'department_id' => $progId,
        ]);

    }
}
