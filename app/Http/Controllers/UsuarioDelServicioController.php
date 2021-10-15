<?php

namespace App\Http\Controllers;
use App\Usuario_del_servicio;
use Illuminate\Http\Request;

class UsuarioDelServicioController extends Controller
{
    //
    public function register(Request $request){

        $request->validate([
        'nombre'=> 'required|string',
        'apellidos'=> 'required|string',
        'tipo'=> 'required|string',
        'razon_social'=> 'required|string',
        'ruc'=> 'required|string',
        'dni'=> 'required|string',
        'direccion'=> 'required|string',
        'codigo_catastral'=> 'required|string',
        'inscripcion'=> 'required|string',
        ]);
        $us=new Usuario_del_servicio([
        'nombre'=> $request->nombre,
        'apellidos'=> $request->apellidos,
        'tipo'=> $request->tipo,
        'razon_social'=> $request->razon_social,
        'ruc'=> $request->ruc,
        'dni'=> $request->dni,
        'direccion'=> $request->direccion,
        'codigo_catastral'=> $request->codigo_catastral,
        'inscripcion'=> $request->inscripcion,
        ]);
  
        $us->save();
        return response()->json([
          "status" => 200,
          "success" => true,
          "message" => "Registro completado con éxito",
          "data" => $us
  
        ]);
      }
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
