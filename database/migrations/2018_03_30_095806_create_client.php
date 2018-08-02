<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('password');
            $table->date('datenaiss');
            $table->string('type');
            $table->string('email');
            $table->integer('age');
            $table->integer('revenue');
            $table->integer('employes_id')->unsigned()->index();
            $table->integer('superieurs_id')->unsigned()->index();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('client',function (Blueprint $table){
            $table->foreign('employes_id')->references('id')->on('employes')->onDelete('no action')->onUpdate('no action');
            $table->foreign('superieurs_id')->references('id')->on('superieurs')->onDelete('no action')->onUpdate('no action');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client');
    }
}
