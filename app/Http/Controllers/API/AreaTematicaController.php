<?php

namespace App\Http\Controllers\API;

use App\Models\areaTematica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaTematicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantidad_por_pagina = 5;
        $info = areaTematica::with('carrera', 'linea')->paginate($cantidad_por_pagina);
        $total = areaTematica::all()->count();
        $paginas_totales = ceil($total / $cantidad_por_pagina);

        return [$info, $paginas_totales];
    }

    public function formatearAreasTematicasAtlasSelect(){
        $array_areas = [];
        $areas_tematicas = areaTematica::select('id','nombre', 'linea_id')->get();
        foreach ($areas_tematicas as $key => $value) {
            array_push($array_areas, (object)['value' => $value->id, 'label' => $value->nombre, 'linea_id' => $value->linea_id]);       
        }
        return $array_areas;
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
            'carrera_id' => 'required',
            'linea_id' => 'required',
        ]);

        return areaTematica::create([
            'nombre' => $request['nombre'],
            'carrera_id' => $request['carrera_id'],
            'linea_id' => $request['linea_id']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\areaTematica  $areaTematica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $areaTematica = areaTematica::findOrFail($request->id);

        $this->validate($request,[
            'nombre' => 'required|string|max:191',
            'carrera_id' => 'required',
            'linea_id' => 'required',
        ]);

        $areaTematica->update($request->all());
        return ['message' => 'informacion actualizada'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\areaTematica  $areaTematica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areaTematica = areaTematica::findOrFail($id);
        $areaTematica->delete();
        return ['message' => 'User Deleted'];
    }
}
