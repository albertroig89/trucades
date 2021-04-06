<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'status' =>'Normal'
        ]);

        DB::table('status')->insert([
            'status' =>'Urgent'
        ]);

        DB::table('status')->insert([
            'status' =>'Pendent'
        ]);


//        App\Status::create([
//            'status' =>'Normal'
//        ]);
//
//        App\Status::create([
//            'status' =>'Urgent'
//        ]);
//
//        App\Status::create([
//            'status' =>'Pendent'
//        ]);
    }
}
