<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaTematicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_tematicas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('carrera_id')->unsigned();  
            $table->index('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->integer('linea_id')->unsigned();  
            $table->index('linea_id');
            $table->foreign('linea_id')->references('id')->on('lineas')->onDelete('cascade');
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
        Schema::dropIfExists('area_tematicas');
    }
}
