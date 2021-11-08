<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones_usuarios', function (Blueprint $table) {
            $table->id();

            $table->integer('usuario_id')->unsigned();  
            $table->index('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('titulo')
            $table->text('texto');
            $table->set('tipo', ['primary', 'success', 'danger', 'warning', 'info']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificaciones_usuarios');
    }
}
