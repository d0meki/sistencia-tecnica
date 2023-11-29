<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function registrarVehiculo(Request $request){
        $imagen = $request->file('foto');
        $rutaImagen = $imagen->store('vehiculos', 'public');
        $vehiculo = Vehiculo::create([
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
            'tipo' => $request->tipo,
            'foto' => $rutaImagen,
            'user_id' => $request->user_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function getVehiculosByid($id){
        $vehiculos = Vehiculo::where('user_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $vehiculos,
        ], 200);
    }

    //===================utils
    public function allVehiculos(){
        $vehiculos = Vehiculo::with('user')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }
}
