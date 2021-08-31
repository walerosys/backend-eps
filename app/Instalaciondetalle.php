<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalaciondetalle extends Model
{
    //
    public $table = "instalacions_actividads";
    protected $fillable = [
        'actividad_id',
        'instalacion_id',
        'cantidad',
        'costo_de_instalacion',
    ];
}
