<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('password');
            $table->date('datenaiss');
            $table->string('emaill');
            $table->integer('age');
            $table->integer('superieurs_id')->unsigned()->index();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('employe_groupe',function (Blueprint $table){

            $table->increments('id');
            $table->integer('employes_id')->unsigned()->index();
            $table->integer('groupe_id')->unsigned()->index();
        });
        Schema::table('employes',function (Blueprint $table){
            $table->foreign('superieurs_id')->references('id')->on('superieurs')->onDelete('no action')->onUpdate('no action');
        });
        Schema::table('employe_groupe',function (Blueprint $table){
            $table->foreign('employes_id')->references('id')->on('employes')->onDelete('no action')->onUpdate('no action');
            $table->foreign('groupe_id')->references('id')->on('groupe')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employes');
        Schema::drop('employe_groupe');
    }
}
