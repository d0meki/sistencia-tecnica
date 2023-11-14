<?php

namespace App\Http\Controllers;

use App\Models\TalleresMecanicos;
use Illuminate\Http\Request;

class TalleresMecanicosController extends Controller
{
    public function registrarTallerMecanico(Request $request){
        TalleresMecanicos::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'nit' => $request->nit,
            'telefono' => $request->telefono,
            'foto' => $request->foto,
            'user_id' => $request->user_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
}
