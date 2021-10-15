<?php

namespace App\Http\Controllers;
use App\Usuario_del_servicio;
use Illuminate\Http\Request;

class UsuarioDelServicioController extends Controller
{
    //
    public function getallusservicio(){
        $us =  Usuario_del_servicio::all();
        if($us->isEmpty()){
            return response()->json([
                'success'=>false,
                'message'=>'No se encontró ningún registro',
            ]);
        }else{
        return response()->json([
            'status' => 200,
            'success'=>true,
            'message'=>'Consulta exitosa',
            'data'=>$us
        ]);
    }
    }
}
