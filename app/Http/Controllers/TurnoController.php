<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencia;

class TurnoController extends Controller
{
    public function mostrarFormulario()
    {
        $dependencias = Dependencia::all();
        return view('GenerarTurno', compact('dependencias'));
    }

    public function generar(Request $request)
    {
        $request->validate([
            'documento' => 'required|numeric',
            'dependencia' => 'required',
        ]);

        $numeroTurno = 'T' . str_pad(rand(1, 9), 4, '0', STR_PAD_LEFT);
        $documento = $request->documento;
        $servicio = Dependencia::find($request->dependencia)->nombre ?? 'No encontrado';

        return view('GenerarTurno', [
            'numeroTurno' => $numeroTurno,
            'documento' => $documento,
            'servicio' => $servicio,
            'dependencias' => Dependencia::all()
        ]);
    }
}
