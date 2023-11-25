<?php

namespace App\Http\Controllers;

use App\Models\Suscripciones;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suscripciones $suscripciones)
    {
        //
    }

    public function membresias()
    {
        return view('membresias');
    }
    public function paymentView($total)
    {
        $data = [
            'total_a_pagar' => $total
        ];
        session()->forget('total');
        session()->get('total');
        session()->push('total', $data);

        return redirect()->route('metodo_pago.index');
    }
    public function viewMetodoPago()
    {
        $value = session()->get('total');
        $total = $value[0]['total_a_pagar'];
        session()->forget('total');
        return view('metodo_pago', compact('total'));
    }
    public function pagar($total)
    {
        switch ($total) {
            case '9.99':
                $membresia = "1 Mes";
                break;
            case '19.99':
                $membresia = "3 Meses";
                break;
            case '59.99':
                $membresia = "1 año";
                break;
            default:
                $membresia = "0 Dias";
                break;
        }
        Suscripciones::create([
            'membresia' => $membresia,
            'total' => $total,
            'user_id' => Auth::id(),
        ]);
        UsuarioRole::create([
            'user_id' => Auth::id(),
            'rol_id' => 3
        ]);
        return redirect()->route('home');
    }
}
