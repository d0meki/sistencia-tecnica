<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)
                        ->with('roles')
                        ->with('roles.role')
                        ->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed',
            ], 401);
        }
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => $user,
        ], 200);
    }
    public function registrarUsuario(Request $request){
        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function asignarRol(Request $request){
        UsuarioRole::create([
            'user_id' => $request->usuario_id,
            'rol_id' => $request->rol_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function getUsuarios(){
        $usuarios = User::with('roles')
                        ->with('roles.role')
                        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Consulta exitosa',
            'data' => $usuarios,
        ], 200);
    }
    public function getUserById($id){
        $usuario = User::where('id',$id)
                        ->with('roles')
                        ->with('roles.role')
                        ->first();
        return response()->json([
            'success' => true,
            'message' => 'Consulta exitosa',
            'data' => $usuario,
        ], 200);
    }
}
