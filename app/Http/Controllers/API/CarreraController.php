<?php

namespace App\Http\Controllers\API;

use App\Models\Carrera;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Carrera::with('lineas')->get();
    }

    public function indexList()
    {
        $cantidad_por_pagina = 5;
        $info = Carrera::with('lineas')->latest()->paginate($cantidad_por_pagina);
        $total = Carrera::all()->count();
        $paginas_totales = ceil($total / $cantidad_por_pagina);

        return [$info, $paginas_totales];
    }

    public function formatearCarrerasAtlasSelect(){
        $array_carreras = [];
        $carreras = Carrera::select('id','nombre')->get();
        foreach ($carreras as $key => $value) {
            array_push($array_carreras, (object)['value' => $value->id, 'label' => $value->nombre]);       
        }
        return $array_carreras;
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
        ]);

        return Carrera::create([
            'nombre' => $request['nombre'],
            'icono' => $request['icono'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $carrera = Carrera::findOrFail($request->id);

        $this->validate($request,[
            'nombre' => 'required|string|max:191',
        ]);

        $carrera->update($request->all());
        return ['message' => 'informacion actualizada'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();
        return ['message' => 'User Deleted'];
    }

}
