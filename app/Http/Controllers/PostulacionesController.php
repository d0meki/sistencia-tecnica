<?php

namespace App\Http\Controllers;

use App\Models\Postulaciones;
use App\Models\TalleresMecanicos;
use App\Models\Tecnicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostulacionesController extends Controller
{
    public function cambiarEstadoPostulacion($id){
        $postulacion = Postulaciones::find($id);
        $postulacion->estado = 1;
        $postulacion->save();
        //TODO: avisar al tecnico donde tiene q ir es decir mandarle los detalles de la solicitud y cambiar el estado del tecnico a asignado

        $tecnico = Tecnicos::find($postulacion->tecnico_id);
        $tecnico->estado = 1;
        $tecnico->save();
        return response()->json([
            'success' => true,
        ], 200);
    }
    //================web
    public function postuacion($id){
        $solicitud_id = $id;
        $taller = TalleresMecanicos::where('user_id',Auth::id())->first();
        $tecnicos = Tecnicos::where('talleres_mecanicos_id', $taller->id)
                                ->where('estado', 0)
                                ->get();
        return view('postulaciones.create', compact('solicitud_id','tecnicos'));
    }
    public function postular(Request $request){
        $taller = TalleresMecanicos::where('user_id',Auth::id())->first();
        $postulacion = Postulaciones::create([
            'solicitud_id'=>$request->solicitud_id,
            'taller_id'=>$taller->id,
            'tecnico_id'=>$request->tecnico_id,
            'estimacion_llegada'=>$request->tiempo_estimado,
            'estimacion_costo'=>$request->costo_estimado,
            'estado'=>0,
        ]);
        //TODO: ENVIAR NOTIFICACION PSUH AL CLIENTE
        return redirect()->route('solicitudes.index');
    }
}
