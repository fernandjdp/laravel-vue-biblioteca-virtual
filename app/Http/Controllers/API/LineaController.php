<?php

namespace App\Http\Controllers\API;

use App\Models\Linea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Linea::with('carrera')->get();
    }

    public function indexList()
    {
        $cantidad_por_pagina = 5;
        $info = Linea::with('carrera')->latest()->paginate($cantidad_por_pagina);
        $total = Linea::all()->count();
        $paginas_totales = ceil($total / $cantidad_por_pagina);

        return [$info, $paginas_totales];
    }

    public function formatearLineasAtlasSelect(){
        $array_lineas = [];
        $lineas = Linea::select('id','nombre', 'carrera_id')->get();
        foreach ($lineas as $key => $value) {
            array_push($array_lineas, (object)['value' => $value->id, 'label' => $value->nombre, 'carrera_id' => $value->carrera_id]);       
        }
        return $array_lineas;
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
        ]);

        return Linea::create([
            'nombre' => $request['nombre'],
            'carrera_id' => $request['carrera_id'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Linea  $Linea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $Linea = Linea::findOrFail($request->id);

        $this->validate($request,[
            'nombre' => 'required|string|max:191',
            'carrera_id' => 'required'
        ]);

        $Linea->update($request->all());
        return ['message' => 'informacion actualizada'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Linea  $Linea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Linea = Linea::findOrFail($id);
        $Linea->delete();
        return ['message' => 'User Deleted'];
    }
}
