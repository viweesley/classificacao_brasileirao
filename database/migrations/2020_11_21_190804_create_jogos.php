<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->integer('clube_mandante_id');
            $table->integer('gols_mandante');
            $table->integer('clube_visitante_id');
            $table->integer('gols_visitante');
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
        Schema::dropIfExists('jogos');
    }
}
