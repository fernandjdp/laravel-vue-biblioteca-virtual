<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('alias');
            $table->mediumText('descripcion');

            $table->integer('carrera_id')->unsigned();  
            $table->index('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->integer('linea_id')->unsigned();  
            $table->index('linea_id');
            $table->foreign('linea_id')->references('id')->on('lineas')->onDelete('cascade');

            $table->integer('areaTematica_id')->unsigned();  
            $table->index('areaTematica_id');
            $table->foreign('areaTematica_id')->references('id')->on('area_tematicas')->onDelete('cascade');
            
            $table->string('ruta_img');

            $table->string('ruta_resumen_pdf');
            $table->string('ruta_trabajo_pdf');
            //$table->json('autores_id'); //Array de users_id Ej. 1, 2, 43, 102
            $table->boolean('aprobado')->default(0);
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
        Schema::dropIfExists('trabajos');
    }
}
