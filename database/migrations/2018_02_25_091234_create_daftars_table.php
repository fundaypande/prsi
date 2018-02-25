<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftars', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('atlit_id')->unsigned();
          $table->integer('lomba_id')->unsigned();
          $table->string('best_time');
          $table->integer('user_id')->unsigned();
          $table->integer('umur_id')->unsigned();
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('atlit_id')->references('id')->on('atlits');
          $table->foreign('lomba_id')->references('id')->on('lombas');
          $table->foreign('umur_id')->references('id')->on('umurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftars');
    }
}
