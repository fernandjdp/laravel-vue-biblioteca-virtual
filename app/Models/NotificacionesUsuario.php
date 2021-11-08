<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class NotificacionesUsuario extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $fillable = [ 'usuario_id', 'titulo' 'texto', 'tipo' ];
 
    /**
     * The attributes that should be mutated to dates.
     * scratchcode.io
     * @var array
     */
 
    protected $dates = [ 'deleted_at' ];
}
