<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperieursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superieurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('password');
            $table->integer('age');
            $table->string('email');
            $table->date('datenaiss');
            $table->rememberToken();
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
        Schema::drop('superieurs');
    }
}
