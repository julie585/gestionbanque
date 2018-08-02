<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_send');
            $table->integer('numero_dest');
            $table->integer('client_sendid')->unsigned()->index();
            $table->integer('client_destid')->unsigned()->index();
            $table->double('montant');
            $table->integer('epargne_sendid')->unsigned()->index();
            $table->integer('epargne_destid')->unsigned()->index();
            $table->integer('courant_sendid')->unsigned()->index();
            $table->integer('courant_destid')->unsigned()->index();
            $table->integer('employe_id')->unsigned()->index();
            $table->integer('superieurs_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('virement',function (Blueprint $table){
            $table->foreign('client_sendid')->references('id')->on('client')->onDelete('no action')->onUpdate('no action');
            $table->foreign('client_destid')->references('id')->on('client')->onDelete('no action')->onUpdate('no action');
            $table->foreign('epargne_sendid')->references('id')->on('compteepargne')->onDelete('no action')->onUpdate('no action');
            $table->foreign('epargne_destid')->references('id')->on('compteepargne')->onDelete('no action')->onUpdate('no action');
            $table->foreign('courant_sendid')->references('id')->on('comptecourant')->onDelete('no action')->onUpdate('no action');
            $table->foreign('courant_destid')->references('id')->on('comptecourant')->onDelete('no action')->onUpdate('no action');
            $table->foreign('superieurs_id')->references('id')->on('superieurs')->onDelete('no action')->onUpdate('no action');
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('virement');
    }
}
