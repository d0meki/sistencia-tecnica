<?php

namespace App\Http\Controllers;

use App\Models\TalleresMecanicos;
use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TalleresMecanicosController extends Controller
{
    public function registrarTallerMecanico(Request $request)
    {
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
    public function getMyTallerMecanico($id)
    {
        $taller = TalleresMecanicos::where('user_id', $id)
            ->with('tecnicos')
            ->with('tecnicos.user')
            ->first();
        return response()->json([
            'success' => true,
            'data' => $taller,
        ], 200);
    }
    public function registrarUsuarioTaller(Request $request)
    {
        try {
            DB::beginTransaction();
            $nuevo_usuario = User::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'ci' => $request->ci,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            UsuarioRole::create([
                'user_id' => $nuevo_usuario->id,
                'rol_id' => 3
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

    //=================WEB==================
    public function createTaller()
    {
        return view('taller.create_taller');
    }
    public function registrarTaller(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
        ]);
        $imagen = $request->file('imagen');
        $ruta = $imagen->store('imagenes', 'public');
         TalleresMecanicos::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'nit' => $request->nit,
            'telefono' => $request->telefono,
            'foto' =>  $ruta,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('home');
    }
    public function storeTaller(Request $request)
    {
    }
}
