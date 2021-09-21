<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;


class ActividadController extends Controller
{
    //

public function register(Request $request){

    $request->validate([
        'nombre'     => 'required|string',
        'actividad'     => 'required|string',
        'unidad_de_medida'    => 'required|string',
        'especificacion'    => 'required|string',
        'costo' => 'required',
    ]);
    $actividad = new Actividad([
        'nombre'     => $request->nombre,
        'actividad'     => $request->actividad,
        'unidad_de_medida'    => $request->unidad_de_medida,
        'especificacion'    => $request->especificacion,
        'costo' => $request->costo,
       
    ]);
    $actividad->save();
    return response()->json([
        "status" => 200,
        "success" => true,
        "message" => "Registro completado con éxito",
        "data" => $actividad
    ]);
}

public function update(Request $request){
    $updateActividad = Actividad::find($request->id); 
    $updateActividad ->nombre = $request->input('nombre');
    $updateActividad ->actividad = $request->input('actividad');
    $updateActividad ->unidad_de_medida = $request->input('unidad_de_medida');
    $updateActividad ->especificacion = $request->input('especificacion');
    $updateActividad ->costo = $request->input('costo');
    $updateActividad ->save();
     return response()->json([
         'status' => 200,
         'success'=>true,
         'message'=>'Datos actualizados correctamente',
         'data'=> $updateActividad
     ]);
 }

 public function destroy(Request $request) {
    $actividad = Actividad::find($request->id);
    $actividad->delete();
    return response()->json([
        'status' => 200,
        'success'=>true,
        'message'=>'La actividad fue eliminado con éxito',
    ]);
}

public function getActividadId(Request $request) {
    $actividad = Actividad::find($request->id);
    //$actividad->delete();
    if($actividad){
        return response()->json([
            'status' => 200,
            'success'=>true,
            'message'=>'La actividad fue encontrada con éxito',
            'data'=>$actividad,
        ]);
    }else{
        return response()->json([
            'status' => 201,
            'success'=>false,
            'message'=>'La actividad no fue encontrada',
        ]);
    }
    
}
public function getallactividad(Request $request){
    $per_page = $request->get('per_page');
    $actividad =  Actividad::paginate($per_page);
    if($actividad->isEmpty()){
        return response()->json([
            'success'=>false,
            'message'=>'No se encontró ningún registro',
        ]);
    }else{
    return response()->json([
        'status' => 200,
        'success'=>true,
        'message'=>'Consulta exitosa',
        'data'=>$actividad
    ]);
}
}
public function buscar(Request $request)
{

    $nombre = $request->get('search');
    $per_page = $request->get('per_page');
    $actividad = Actividad::where('nombre','like',"%$nombre%")->paginate($per_page);
    
    return response()->json([
        'status' => 200,
        'success'=>true,
        'message'=>'Consulta exitosa',
        'data'=>$actividad
    ]);
}
}
