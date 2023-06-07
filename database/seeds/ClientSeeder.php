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
            'name' => "Gestoria Paquita",
            'email' => "info@gestoriapaquita.com",
        ]);

        Client::create([
            'name' => "Materials de construcció Pepe",
            'email' => "info@mcpepe.es",
        ]);

        Client::create([
            'name' => "Carburants BP",
            'email' => "info@carburantsbp.com",
        ]);

        Client::create([
            'name' => "Optica Miranda",
            'email' => "info@opticamiranda.com",
        ]);

        factory(Client::class, 40)->create();
    }
}
