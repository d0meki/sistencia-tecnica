<?php

namespace App\Http\Controllers;

use App\Models\Postulaciones;
use App\Models\TalleresMecanicos;
use App\Models\Tecnicos;
use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TecnicosController extends Controller
{
    public function phpaddTecnicoTaller(Request $request)
    {
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
    public function getTecnicosByTaller($id)
    {
        $tecnicos = Tecnicos::where('talleres_mecanicos_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $tecnicos,
        ], 200);
    }
    public function tareaTecnico($id)
    {
        $postulacion = Postulaciones::where('tecnico_id', $id)
            ->where('estado', 1)
            ->with('solicitud')
            ->with('solicitud.user')
            ->first();
        if (isset($postulacion)) {
            return response()->json([
                'success' => true,
                'data' => $postulacion,
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'data' => $postulacion,
            ], 200);
        }
    }
    public function actualizarPosicion(Request $request){
        $tecnico = Tecnicos::where('user_id', $request->id)->first();
        $tecnico->latitud = $request->latitud;
        $tecnico->longitud = $request->longitud;
        $tecnico->save();
        return response()->json([
            'success' => true,
        ], 200);
    }
    //=============web========
    public function index()
    {
        $taller = TalleresMecanicos::where('user_id', Auth::id())->first();
        $tecnicos = Tecnicos::where('talleres_mecanicos_id', $taller->id)
            ->with('user')
            ->get();
        return view('tecnicos.index', compact('tecnicos'));
    }
    public function create()
    {
        return view('tecnicos.create');
    }
    public function store(Request $request)
    {
        $taller = TalleresMecanicos::where('user_id', Auth::id())->first();
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
            'talleres_mecanicos_id' => $taller->id,
            'estado' => 0,
            'user_id' => $nuevo_usuario->id
        ]);
        UsuarioRole::create([
            'user_id' => $nuevo_usuario->id,
            'rol_id' => 4
        ]);
        return redirect()->route('tecnicos.index');
    }
    public function verTecnicoEnElMapa(int $id)
    {
        $tecnico = Tecnicos::find($id);
        return view('tecnicos.tecnico-map', compact('tecnico'));
    }
    public function edit($id)
    {
        $tecnico = Tecnicos::find($id);
        return view('tecnicos.add_lat_lng', compact('tecnico'));
    }
    public function storeLatLng(Request $request)
    {
        // dd($request->all());
        $tecnico = Tecnicos::find($request->id);
        $tecnico->latitud = $request->latitud;
        $tecnico->longitud = $request->longitud;
        $tecnico->save();
        return redirect()->route('tecnicos.index');
    }
    public function allTecnicosMap()
    {
        $taller = TalleresMecanicos::where('user_id', Auth::id())->first();
        $tecnicos = Tecnicos::where('talleres_mecanicos_id', $taller->id)
            ->with('user')
            ->get();
        // dd($tecnicos);
        return view('tecnicos.all_tecnicos_map', compact('tecnicos'));
    }
}
