<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('school')->unsigned();
            $table->string('phone','15');
            $table->string('gambar','200');
            $table->boolean('status')->default(0);
            $table->boolean('role')->default(1);
            $table->string('token','100');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('school')->references('id')->on('sekolahs')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
