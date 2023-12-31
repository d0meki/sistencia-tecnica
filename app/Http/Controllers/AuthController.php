<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function registrarUsuario(Request $request)
    {
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
            'rol_id' => 2
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function asignarRol(Request $request)
    {
        UsuarioRole::create([
            'user_id' => $request->usuario_id,
            'rol_id' => $request->rol_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso',
        ], 200);
    }
    public function getUsuarios()
    {
        $usuarios = User::with('roles')
            ->with('roles.role')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Consulta exitosa',
            'data' => $usuarios,
        ], 200);
    }
    public function getUserById($id)
    {
        $usuario = User::where('id', $id)
            ->with('roles')
            ->with('roles.role')
            ->first();
        return response()->json([
            'success' => true,
            'message' => 'Consulta exitosa',
            'data' => $usuario,
        ], 200);
    }

    //=============================WEB================================
    public function loginview()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register_user');
    }
    public function guardarRegistro(Request $request)
    {
        // dd($request->all());
        $nuevo_usuario = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login');
    }
    public function authLogin(Request $request)
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
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user_id = Auth::id();
            $user = User::where('id', $user_id)
                ->first();
            $roles = $user->roles;
            if ($roles->isEmpty()) {
                return redirect()->intended('membresias');
            } else {
                return redirect()->intended('home');
            }
        }

        // return redirect()->route('home');
    }
    public function logout()
    {

        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    //======util===
    public function allroles(){
        $roles = Role::all();
        return view('auth.allroles', compact('roles'));
    }
    public function allUsuarios(){
        $usuarios = User::with('roles')->with('roles.role')->get();
        // dd($usuarios);
        return view('auth.allusuarios', compact('usuarios'));
    }

}
