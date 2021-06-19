<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('dorsal');
            $table->string('nacionalidad');
            $table->date('fecha_nac');
            $table->string('posicion');
            $table->integer('altura');
            $table->unsignedBigInteger('team_id'); //esto sera clave foranea, el id del equipo.Se pone nombre de la tabla y el campo team_id
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
