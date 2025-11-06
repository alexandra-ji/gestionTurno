<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencia;
use App\Models\Turnos;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

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
            'dependencia' => 'required|exists:dependencias,id',
        ]);

    
        $dependencia = Dependencia::find($request->dependencia);

       
        $letra = strtoupper(substr($dependencia->nombre, 0, 1));

        $ultimoTurno = Turnos::where('idServicio', $dependencia->id)
                            ->orderBy('id', 'desc')
                            ->first();

        $nuevoNumero = $ultimoTurno
            ? (int) substr($ultimoTurno->codigoTurno, 1) + 1
            : 1;

        $codigoTurno = $letra . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);


        $usuario = Usuario::where('numeroDocumento', $request->documento)->first();

        if (!$usuario) {
            return back()->withErrors(['documento' => 'El número de documento no está registrado.']);
        }

       
        $empleado = $dependencia->empleados()->inRandomOrder()->first();

        if (!$empleado) {
            return back()->withErrors(['dependencia' => 'No hay empleados asignados a esta dependencia.']);
        }

        Turnos::create([
            'codigoTurno' => $codigoTurno,
            'estadoTurno' => 'Pendiente',
            'fecha' => now()->toDateString(),
            'horaInicio' => now()->format('H:i:s'),
            'idUsuario' => $usuario->id,
            'idServicio' => $dependencia->id,
            'idEmpleado' => $empleado->id,
        ]);

        return redirect()
            ->route('Turno.index')
            ->with('success', '¡Turno generado exitosamente!');
    }
}
