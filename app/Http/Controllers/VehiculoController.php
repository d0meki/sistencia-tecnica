<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function registrarVehiculo(Request $request){
        $vehiculo = Vehiculo::create([
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
            'tipo' => $request->tipo,
            'usuario_id' => $request->usuario_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function getVehiculosByid($id){
        $vehiculos = Vehiculo::where('usuario_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $vehiculos,
        ], 200);
    }
}
