<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('puntosLocal');
            $table->integer('puntosVisitante');
            $table->date('fechaPartido');
            $table->unsignedBigInteger('team_id_1');
            $table->unsignedBigInteger('team_id_2');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('team_id_1')->references('id')->on('teams');
            $table->foreign('team_id_2')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
