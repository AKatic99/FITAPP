<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


//Koje sve uloge imaju odredjene dozvole
class UlogaToDozvola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uloga_to_dozvola', function (Blueprint $table) {
            $table->unsignedBigInteger('id_uloge');
            $table->foreign('id_uloge')->references('id')->on('uloge');

            $table->unsignedBigInteger('opis_uloge');
            $table->foreign('opis_uloge')->references('id')->on('dozvole');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dozvola', function (Blueprint $table) {
            //
        });
    }
}

