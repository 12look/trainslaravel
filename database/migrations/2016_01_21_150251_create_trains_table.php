<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('dispatch_station_id')->unsigned();
            $table->foreign('dispatch_station_id')->references('id')->on('stations');
            $table->integer('arrival_station_id')->unsigned();
            $table->foreign('arrival_station_id')->references('id')->on('stations');
            $table->dateTime('dispatch_time');
            $table->dateTime('arrival_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trains');
    }
}
