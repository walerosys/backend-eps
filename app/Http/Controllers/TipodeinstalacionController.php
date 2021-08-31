<?php

namespace App\Http\Controllers;

use App\Tipodeinstalacion;
use Illuminate\Http\Request;

class TipodeinstalacionController extends Controller
{
    //

    public function register(Request $request){

      $request->validate([
          'codigo'=> 'required|string',
          'nombre'=> 'required|string'
      ]);
      $tipo=new Tipodeinstalacion([
          'codigo'=> $request->codigo,
          'nombre'=> $request->nombre,
      ]);

      $tipo->save();
      return response()->json([
        "status" => 200,
        "success" => true,
        "message" => "Registro completado con éxito",
        "data" => $tipo

      ]);
    }

    public function update(Request $request){
       $updateTipo = Tipodeinstalacion::find($request->id);
       $updateTipo->codigo=$request->input('codigo');
       $updateTipo->nombre=$request->input('nombre');
       $updateTipo->save();
       return response()->json([
           'status'=> 200,
           'success'=> true,
           'message'=> 'Datos actualizados correctamente',
           'data'=> $updateTipo
       ]);
    }

    public function destroy(Request $request) {
        $tipo = Tipodeinstalacion::find($request->id);
        $tipo->delete();
        return response()->json([
            'status' => 200,
            'success'=>true,
            'message'=>'Fue eliminado con éxito',
        ]);
    }

    public function getalltipo(){
        $tipo = Tipodeinstalacion::all();
        if($tipo->isEmpty()){
            return response()->json([
                'success'=>false,
                'message'=>'No se encontro ningun registro',
            ]);
        }else{
        return response()->json([
            'status' => 200,
            'success'=>true,
            'message'=>'Consulta exitosa',
            'data'=>$tipo
        ]);
    }
    }
}
