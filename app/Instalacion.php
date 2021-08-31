<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    //
    protected $fillable = [
        'tipo_id',
        'uservicio_id',
        'user_id',
        'fecha',
        'sub_total',
        'utilidad',
        'igv',
        'monto_total',
    ];
}
