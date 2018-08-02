<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('versement',function (Blueprint $table){
            $table->increments('id');
            $table->integer('numero');
            $table->date('date');
            $table->float('montant');
            $table->integer('comptecourant_id')->unsigned()->index();
            $table->integer('compteepargne_id')->unsigned()->index();
            $table->integer('employes_id')->unsigned()->index();
            $table->integer('superieurs_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('versement',function (Blueprint $table){
            $table->foreign('comptecourant_id')->references('id')->on('comptecourant')->onDelete('no action')->onUpdate('no action');
            $table->foreign('compteepargne_id')->references('id')->on('compteepargne')->onDelete('no action')->onUpdate('no action');
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
        Schema::drop('versement');
    }
}
