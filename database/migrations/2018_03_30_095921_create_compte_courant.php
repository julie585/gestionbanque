<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteCourant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptecourant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->float('solde');
            $table->date('datecreation');
            $table->float('decouvert');
            $table->integer('client_id')->unsigned()->index();
            $table->timestamps();

        });

        Schema::table('comptecourant',function (Blueprint $table){
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
        Schema::drop('comptecourant');
    }
}
