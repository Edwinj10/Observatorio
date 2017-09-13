<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTesis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      


 Schema::create('teses', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('id_indicador');
            $table->integer('id_carrera');
            $table->string('tema');
            $table->string('introduccion');
            $table->string('autor');
            $table->string('imagen');
            $table->string('archivo');
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
        Schema::dropIfExists('carreras');
    }
}
