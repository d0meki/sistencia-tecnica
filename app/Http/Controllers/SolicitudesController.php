<?php

namespace App\Http\Controllers;

use App\Models\Fotografia;
use App\Models\Solicitudes;
use App\Models\TalleresMecanicos;
use App\Models\Tecnicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudesController extends Controller
{
    public function nuevaSolicitud(Request $request)
    {
        $ultima_solicitude = Solicitudes::latest()->first();
        if (isset($ultima_solicitude)) {
            $carpeta = strval($ultima_solicitude->id + 1);
        } else {
            $carpeta = "1";
        }
        $notaAudio = $request->file('nota_audio');
        $rutaNotaAudio = $notaAudio->store($carpeta . '/audio', 'public');
        $solicitud = Solicitudes::create([
            'user_id' => $request->user_id,
            'estado' => 0,
            'nota_audio' => $rutaNotaAudio,
            'fecha' => date('Y-m-d'),
            'hora' => date('h:i:s'),
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);
        $imagenes = $request->file('fotos');
        foreach ($imagenes as $imagen) {
            $rutaImagen = $imagen->store($carpeta . '/fotos', 'public');
            Fotografia::create([
                'foto' => $rutaImagen,
                'solicitud_id' => $solicitud->id,
            ]);
        }
        return response()->json([
            'success' => true,
            'carpeta' => $carpeta
        ], 200);
        return redirect()->route('solicitudes.index');
    }






















    //==============web=================
    public function index()
    {
        $solicitudes = Solicitudes::where('estado', 0)
                            ->with('user')
                            ->get();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function show($id){
        $taller = TalleresMecanicos::where('user_id',Auth::id())->first();
        $tecnicos = Tecnicos::where('talleres_mecanicos_id', $taller->id)
                        ->with('user')
                        ->get();

        $solicitud = Solicitudes::where('id',$id)->with('user', 'fotografias')->first();
        return view('solicitudes.show', compact('solicitud', 'tecnicos'));
    }

}
