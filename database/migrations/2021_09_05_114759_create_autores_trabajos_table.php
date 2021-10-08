<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoresTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores_trabajos', function (Blueprint $table) {
            $table->id();

            $table->integer('autor_id')->unsigned();  
            $table->index('autor_id');
            $table->foreign('autor_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('trabajo_id')->unsigned();  
            $table->index('trabajo_id');
            $table->foreign('trabajo_id')->references('id')->on('trabajos')->onDelete('cascade');

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
        Schema::dropIfExists('autores_trabajos');
    }
}
