<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function lineas(){
        return $this->hasMany(Linea::class,'carrera_id','id');
    }

    public function trabajos(){
        return $this->hasMany(Trabajo::class,'carrera_id','id');
    }
}
