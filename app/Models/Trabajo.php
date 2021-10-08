<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'alias',    
        'areaTematica_id',
        'descripcion',
        'linea_id',
        'carrera_id',
        'ruta_img',
        'ruta_resumen_pdf',
        'ruta_trabajo_pdf',
        //'autores_id',
        'aprobado',
    ];

     protected $casts = [
        'autores_id' => 'array'
    ];

    public function linea()
    {
    	return $this->belongsTo(Linea::class,'linea_id');
    }

    public function carrera()
    {
    	return $this->belongsTo(Carrera::class,'carrera_id');
    }

    public function autores()
    {
        return $this->hasMany(User::class,'trabajo_id');
    }
}
