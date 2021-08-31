<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $fillable = [
        'nombre',
        'actividad',
        'unidad_de_medida',
        'especificacion',
        'costo',
    ];
}
