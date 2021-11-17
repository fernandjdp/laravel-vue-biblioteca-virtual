<?php

namespace App\Http\Controllers\API;

use App\Models\Trabajo;
use App\Models\User;
use App\Http\Traits\NotificacionTrait;
use App\Models\autoresTrabajo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 

class TrabajoController extends Controller
{
    use NotificacionTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trabajo::with('linea', 'autores')->get();
    }

    public function indexList()
    {
        $cantidad_por_pagina = 5;
        $info = Trabajo::with('linea', 'carrera', 'autores')->latest()->paginate($cantidad_por_pagina);
        $total = Trabajo::all()->count();
        $paginas_totales = ceil($total / $cantidad_por_pagina);

        return [$info, $paginas_totales];
    }

    /**
     * Muestra los trabajos de una carrera en específico
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPorCarrera($carrera_id)
    {
        return Trabajo::with('linea', 'autores')->where('carrera_id',$carrera_id)
                      ->get();
    }

    /**
     * Muestra los trabajos de una linea en específico
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPorRama($carrera_id, $rama_id)
    {
        return Trabajo::with('linea', 'autores')->where('carrera_id', $carrera_id)
                      ->where('linea_id', $rama_id)
                      ->get();
    }

    /**
     * Describe la ruta que tendrá el item a cargar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function crearRuta($item)
    {
        $nombre_archivo = date('dmy-m').'_'.$item->getClientOriginalName();

        if ($item->getClientMimeType() == "image/jpeg") { //Si es una imagen
            $ruta_item = '/img/' . $nombre_archivo;
        }
        elseif ($item->getClientMimeType() == "application/pdf") { //Si es pdf
            $ruta_item = '/trabajos_especiales/' . $nombre_archivo;
        }
        else{
            $ruta_item = 'nulo';
            return response()->json(['error'=>'El tipo de archivo no es adecuado']);
        }
        
        return $ruta_item;
    }
    private function crearRutaResumen($item){
        $nombre_archivo = date('dmy-m').'_'.$item->getClientOriginalName();
        $ruta_item = '/resumenes/' . $nombre_archivo;
        return $ruta_item;
    }
    private function cargarResumen($item){
        $nombre_archivo = date('dmy-m').'_'.$item->getClientOriginalName();
        $item->move('resumenes', $nombre_archivo);
        return ['message' => 'Trabajo registrado exitosamente'];
    }

    /**
     * Carga el item y lo guarda en la carpeta correspondiente
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function cargarItem($item)
    {
        $nombre_archivo = date('dmy-m').'_'.$item->getClientOriginalName();

        if ($item->getClientMimeType() == "image/jpeg") { //Si es una imagen
            $item->move('img', $nombre_archivo);
        }
        elseif ($item->getClientMimeType() == "application/pdf") { //Si es pdf
            $item->move('trabajos_especiales', $nombre_archivo);
        }
        else{
            $ruta_item = 'nulo';
            return response()->json(['error'=>'El tipo de archivo no es adecuado']);
        }
        
        return ['message' => 'Trabajo registrado exitosamente'];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string|max:191',
            'alias' => 'required',
            'descripcion' => 'required',
            'carrera_id' => 'required',
            'linea_id' => 'required',
            'area_tematica_id' => 'required',
            'ruta_resumen_pdf' => 'required|mimes:pdf',
            'ruta_trabajo_pdf' => 'required|mimes:pdf',
            'autores' => 'required',
        ]);

        $ruta_resumen_pdf = $this->crearRutaResumen($request->ruta_resumen_pdf);
        $ruta_trabajo_pdf = $this->crearRuta($request->ruta_trabajo_pdf);

        Trabajo::create([
            'nombre' => $request->nombre,
            'alias' => $request->alias,
            'descripcion' => $request->descripcion,
            'carrera_id' => $request->carrera_id,
            'linea_id' => $request->linea_id,
            'areaTematica_id' => $request->area_tematica_id,
            'ruta_img' => 'Datos_Falsos',
            'ruta_resumen_pdf' => $ruta_resumen_pdf,
            'ruta_trabajo_pdf' => $ruta_trabajo_pdf,
            'aprobado' => false
        ]);

        $trabajo_id = Trabajo::latest()->first()->id;

        foreach ($request->autores as $key => $id) {
            $usuario = User::find($id);
            $usuario->trabajo_id = $trabajo_id;
            $usuario->save();

            $this->crearNotificacion($id, 'trabajo_registrado');

        }
        

        //$this->cargarItem($request->ruta_img);
        $this->cargarResumen($request->ruta_resumen_pdf);
        $this->cargarItem($request->ruta_trabajo_pdf);

        return ['message' => 'Trabajo registrado exitosamente'];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajo  $Trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        /* Los autores del trabajo de grado NO PODRAN SER MODIFICADOS*/
        $Trabajo = Trabajo::findOrFail($request->id);

        $this->validate($request,[
            'nombre' => 'required|string|max:191',
            'alias' => 'required',
            'descripcion' => 'required',
            'carrera_id' => 'required',
            'linea_id' => 'required',
            'areaTematica_id' => 'required',
            'ruta_resumen_pdf' => 'required|string',
            'ruta_trabajo_pdf' => 'required|string',
            'autores' => 'required',
        ]);

        $Trabajo->update($request->all());
        return ['message' => 'informacion actualizada'];
    }

    public function aprobar($id){
        $trabajo = Trabajo::with('autores')->findOrFail($id);
        $trabajo->aprobado = 1;
        $trabajo->save();
        foreach ($trabajo->autores as $info) {
            $this->crearNotificacion($info->id, 'trabajo_aprobado');
        }

        return ['message' => 'informacion aprobada'];

    }

    /**
     * Rechaza el trabajo de grado cambiado el estatus del mismo, eliminando los registros y notificando a los usuarios
     * @param  [int] $id [description]
     * @return [string]     [Mensaje de confirmacion]
     */
    public function rechazar($id){
        $trabajo = Trabajo::with('autores')->findOrFail($id);

        $trabajo->rechazado = 1;
        $trabajo->save();

        $this->eliminarTrabajos($trabajo);

        $this->rechazarTrabajoUsuarios($trabajo);

        return ['message' => 'informacion aprobada'];

    }

    /**
     * Elimina los registros de trabajo_id en cada usuario y se le notifica el rechazo
     * @param  [Collection] $trabajo [Colleccion del trabajo correspondiente]
     * @return [type]          [description]
     */
    private function rechazarTrabajoUsuarios($trabajo)
    {
        foreach ($trabajo->autores as $info) {
            
            //Eliminar el registro
            $usuario = User::find($info->id);
            $usuario->trabajo_id = null;
            $usuario->save();

            //Notificacion
            $this->crearNotificacion($info->id, 'trabajo_rechazado');
        }

        return true;
    }

    /**
     * Elimina los archivos de trabajo de grado y su respectivo resumen
     * @param  [Collection] $trabajo [Colleccion del trabajo correspondiente]
     * @return [type]          [description]
     */
    private function eliminarTrabajos($trabajo){
        /**
         * Elimina los archivos del trabajo de grado y su resumen
         */
        if (File::exists(public_path($trabajo->ruta_resumen_pdf)) && File::exists(public_path($trabajo->ruta_trabajo_pdf))) {
            File::delete(public_path($trabajo->ruta_resumen_pdf));
            File::delete(public_path($trabajo->ruta_trabajo_pdf));
        }
        else {
            return ['message' => 'Error, los archivos no existen'];
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajo  $Trabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Trabajo = Trabajo::findOrFail($id);
        $Trabajo->delete();
        return ['message' => 'User Deleted'];
    }
}
