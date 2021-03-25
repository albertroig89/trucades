<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'title' => 'Tecnic',
        ]);

        Department::create([
            'title' => 'Administracio',
        ]);

        Department::create([
            'title' => 'Programador',
        ]);

        Department::create([
            'title' => 'Comercial',
        ]);

    }
}
