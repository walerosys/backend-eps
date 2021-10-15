<?php

namespace App\Http\Controllers;

use App\Instalacion;
use App\Instalaciondetalle;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

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
                        /****************join start******************/
                       /* $datos= DB::table('instalacions')
                        ->join('tipodeinstalacions', 'instalacions.tipo_id', '=', 'tipodeinstalacions.id')
                        ->join('usuario_del_servicios', 'instalacions.uservicio_id', '=', 'usuario_del_servicios.id')
                        ->join('users', 'instalacions.user_id', '=', 'users.id')
                        ->join('instalacions_actividads', 'instalacions.id', '=', 'instalacions_actividads.instalacion_id')
                        ->join('actividads', 'instalacions_actividads.actividad_id', '=', 'actividads.id')
                        ->where('instalacions.id', '=',$instal->id)
                        ->select(
                           'tipodeinstalacions.nombre',
                           'instalacions.*',
                           'usuario_del_servicios.*',
                           'users.*',
                           'instalacions_actividads.*',
                           'actividads.*')
                        ->get();*/
                        /****************join end******************/

            return response()->json([
                "status" => 200,
                "success" => true,
                "message" => "Registro completado con éxito",
                "data" => "ssfd"
            ]);
    }
}
