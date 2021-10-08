<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $table = 'lineas';

    protected $fillable = [
        'nombre',
        'carrera_id'
    ];

    public function carrera()
    {
    	return $this->belongsTo(Carrera::class,'carrera_id');
    }

    public function areas_tematicas(){
        return $this->hasMany(areaTematica::class,'linea_id','id');
    }
}
