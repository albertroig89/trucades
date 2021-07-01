<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('job', 1000);
            $table->dateTime('inittime');
            $table->dateTime('endtime');
            $table->integer('totalmin');
            $table->string('clientname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histjobs');
    }
}
