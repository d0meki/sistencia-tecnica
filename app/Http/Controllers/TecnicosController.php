<?php

namespace App\Http\Controllers;

use App\Models\Tecnicos;
use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TecnicosController extends Controller
{
    public function addTecnicoTaller(Request $request){
        try {
            DB::beginTransaction();
            $contraseñaHash = Hash::make($request->ci);
            $nuevo_usuario = User::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'ci' => $request->ci,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => $contraseñaHash,
            ]);
            Tecnicos::create([
                'talleres_mecanicos_id' => $request->taller_id,
                'user_id' => $nuevo_usuario->id
            ]);
            UsuarioRole::create([
                'user_id' => $nuevo_usuario->id,
                'rol_id' => 4
            ]);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Registro exitoso',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }

    }
    public function getTecnicosByTaller($id){
        $tecnicos = Tecnicos::where('taller_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $tecnicos,
        ], 200);
    }
}
