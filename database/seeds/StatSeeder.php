<?php

use App\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('stat')->insert([
//            'status' =>'Normal'
//        ]);
//
//        DB::table('stat')->insert([
//            'status' =>'Urgent'
//        ]);
//
//        DB::table('stat')->insert([
//            'status' =>'Pendent'
//        ]);


        Stat::create([
            'title' =>'Normal'
        ]);

        Stat::create([
            'title' =>'Urgent'
        ]);

        Stat::create([
            'title' =>'Pendent'
        ]);
    }
}
