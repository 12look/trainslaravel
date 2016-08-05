<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWagonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->enum('type', ['св', 'купэ', 'плацкарт']);
            $table->integer('train_id')->unsigned();
            $table->foreign('train_id')->references('id')->on('trains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wagons');
    }
}
