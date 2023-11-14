<?php

namespace App\Http\Controllers;

use App\Models\Tecnicos;
use Illuminate\Http\Request;

class TecnicosController extends Controller
{
    public function addTecnicoTaller(Request $request){
        Tecnicos::create([
            'taller_id' => $request->taller_id,
            'user_id' => $request->user_id,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function getTecnicosByTaller($id){
        $tecnicos = Tecnicos::where('taller_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $tecnicos,
        ], 200);
    }
}
