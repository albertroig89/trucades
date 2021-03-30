<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => "Bertomeu i Santiago",
            'email' => "kilian@gabinetadministratiu.com",
        ]);

        Client::create([
            'name' => "Materials Selma",
            'email' => "juanjo@selma.es",
        ]);

        Client::create([
            'name' => "Carburants del Montsia",
            'email' => "miguel@carburantsmontsia.com",
        ]);

        Client::create([
            'name' => "Optica Esguard",
            'email' => "isa@opticaesguard.com",
        ]);
    }
}
