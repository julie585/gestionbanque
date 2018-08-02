<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteEpargne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteepargne', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->float('solde');
            $table->date('datecreation');
            $table->float('taux');
            $table->integer('client_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('compteepargne',function (Blueprint $table){
           $table->foreign('client_id')->references('id')->on('client')->onDelete('no action')->onUpdate('no action');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compteepargne');
    }
}
