<?php

namespace App\Http\Controllers;

use App\Instalacion;
use App\Instalaciondetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstalacionController extends Controller
{
    //

public function registerinsta(Request $request){

     $request->validate([
                'tipo_id'     => 'required',
                'uservicio_id'     => 'required',
                'user_id'    => 'required',
                'fecha'    => 'required',
                'sub_total' => 'required',
                'utilidad' => 'required',
                'igv' => 'required',
                'monto_total' => 'required',
             ]);
             $instal = new Instalacion([
                'tipo_id'     => $request->tipo_id,
                'uservicio_id'     => $request->uservicio_id,
                'user_id'    => $request->user_id,
                'fecha'    => $request->fecha,
                'sub_total' => $request->sub_total,
                'utilidad' => $request->utilidad,
                'igv' => $request->igv,
                'monto_total' => $request->monto_total,
               
            ]);
            $instal->save();

            $detall = $request->deinstalacion;
             foreach($detall as $a=>$det)
            {
                $detalle = new Instalaciondetalle();
                $detalle->actividad_id =$det['actividad_id'];
                $detalle->instalacion_id = $instal->id;
                $detalle->cantidad =$det['cantidad'];
                $detalle->costo_de_instalacion =$det['costo_de_instalacion'];
                $detalle->save();
            }
            $datos= DB::table('tipodeinstalacions')
            ->join('instalacions', 'tipodeinstalacions.id', '=', 'instalacions.tipo_id')
            ->join('usuario_del_servicios', 'instalacions.uservicio_id', '=', 'usuario_del_servicios.id')
            ->where('instalacions.id', '=', $instal->id)
            ->select(
               'codigo',
               'tipodeinstalacions.nombre AS nombre_tipo',
               'instalacions.id',
               'tipo_id',
               'uservicio_id',
               'user_id',
               'fecha',
               'sub_total',
               'utilidad',
               'igv',
               'monto_total',
               'usuario_del_servicios.nombre',
               'apellidos',
               'tipo',
               'razon_social',
               'ruc',
               'dni',
               'direccion',
               'codigo_catastral',
               'inscripcion')
            ->get();
            return response()->json([
                'success' => true,
                'message' => 'Registro completado con éxito',
                'instalacion' => $datos
            ]);
    }

    public function getInstalacion(Request $request){
        $per_page = $request->get('per_page');
        $datos= DB::table('tipodeinstalacions')
             ->join('instalacions', 'tipodeinstalacions.id', '=', 'instalacions.tipo_id')
             ->join('usuario_del_servicios', 'instalacions.uservicio_id', '=', 'usuario_del_servicios.id')
             ->select(
                'codigo',
                'tipodeinstalacions.nombre AS nombre_tipo',
                'instalacions.id',
                'tipo_id',
                'uservicio_id',
                'user_id',
                'fecha',
                'sub_total',
                'utilidad',
                'igv',
                'monto_total',
                'usuario_del_servicios.nombre',
                'apellidos',
                'tipo',
                'razon_social',
                'ruc',
                'dni',
                'direccion',
                'codigo_catastral',
                'inscripcion')
             ->paginate($per_page);

             if($datos->isEmpty()){
                return response()->json([
                    'success'=>false,
                    'message'=>'No se encontró ningún registro',
                ]);
            }else{
            return response()->json([
                'status' => 200,
                'success'=>true,
                'message'=>'Consulta exitosa',
                'data'=>$datos
            ]);
        }

    }
    public function buscar(Request $request){

    $dni = $request->get('search');
    $per_page = $request->get('per_page');
        $datos= DB::table('tipodeinstalacions')
             ->join('instalacions', 'tipodeinstalacions.id', '=', 'instalacions.tipo_id')
             ->join('usuario_del_servicios', 'instalacions.uservicio_id', '=', 'usuario_del_servicios.id')
             ->where('dni','like',"%$dni%")
             ->select(
                'codigo',
                'tipodeinstalacions.nombre AS nombre_tipo',
                'instalacions.id',
                'tipo_id',
                'uservicio_id',
                'user_id',
                'fecha',
                'sub_total',
                'utilidad',
                'igv',
                'monto_total',
                'usuario_del_servicios.nombre',
                'apellidos',
                'tipo',
                'razon_social',
                'ruc',
                'dni',
                'direccion',
                'codigo_catastral',
                'inscripcion')
             ->paginate($per_page);

             if($datos->isEmpty()){
                return response()->json([
                    'success'=>false,
                    'message'=>'No se encontró ningún registro',
                ]);
            }else{
            return response()->json([
                'status' => 200,
                'success'=>true,
                'message'=>'Consulta exitosa',
                'data'=>$datos
            ]);
        }
}
}
