<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_del_servicio extends Model
{
    //
    protected $fillable = [
        'nombre',
         'apellidos',
         'tipo',
         'razon_social',
         'ruc',
         'dni',
         'direccion',
         'codigo_catastral',
         'inscripcion',
     ];
}
