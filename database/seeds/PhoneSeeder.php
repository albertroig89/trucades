<?php

use Illuminate\Database\Seeder;
use App\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create([
            'client_id' => 1,
            'phone' => 977480006,
        ]);

        Phone::create([
            'client_id' => 1,
            'phone' => 977489518,
        ]);

        Phone::create([
            'client_id' => 1,
            'phone' => 977489981,
        ]);

        Phone::create([
            'client_id' => 2,
            'phone' => 977730043,
        ]);

        Phone::create([
            'client_id' => 2,
            'phone' => 977705506,
        ]);

        Phone::create([
            'client_id' => 3,
            'phone' => 977702262,
        ]);

        Phone::create([
            'client_id' => 4,
            'phone' => 977706942,
        ]);

        factory(Phone::class, 40)->create();
    }
}
