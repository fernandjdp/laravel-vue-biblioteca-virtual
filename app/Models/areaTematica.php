<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaTematica extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'carrera_id', 'linea_id'
    ];

    public function linea()
    {
    	return $this->belongsTo(Linea::class,'linea_id');
    }

    public function carrera()
    {
    	return $this->belongsTo(Carrera::class,'carrera_id');
    }
}
