<?php

namespace App\Http\Controllers\API;

use App\Models\NotificacionesUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificacionesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth('api')->user()->id;
        return NotificacionesUsuario::where('usuario_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotificacionesUsuario  $notificacionesUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificacionesUsuario $notificacionesUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotificacionesUsuario  $notificacionesUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificacionesUsuario $notificacionesUsuario)
    {
        //
    }
}
