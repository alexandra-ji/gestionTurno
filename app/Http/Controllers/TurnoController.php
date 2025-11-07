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

        $dependencia = Dependencia::find($request->dependencia);

        
        $letra = strtoupper(substr($dependencia->nombre, 0, 1));
        $ultimoTurno = Turnos::where('idServicio', $dependencia->id)
                            ->orderBy('id', 'desc')
                            ->first();
       if ($ultimoTurno) {
    
        $numeroAnterior = (int) substr($ultimoTurno->codigoTurno, 1);
        $nuevoNumero = $numeroAnterior + 1;
        } else {
        
            $nuevoNumero = 1;
        }

        $codigoTurno = $letra . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);

        $usuario = Usuario::where('numeroDocumento', $request->documento)->first();

        if (!$usuario) {
            
            $usuario = Usuario::create([
                'nombre' => 'Usuario ' . $request->documento,
                'numeroDocumento' => $request->documento,
                'telefono' => 'No registrado',
                'correo' => 'sincorreo',
                'tipoDocumento' =>  'Cedula De Ciudadania'
            ]);
        }


        $empleado = $dependencia->empleados()->inRandomOrder()->first();

        if (!$empleado) {
            return back()->withErrors(['dependencia' => 'No hay empleados asignados a esta dependencia.']);
        }

       
        Turnos::create([
            'codigoTurno' => $codigoTurno,
            'estadoTurno' => 'Pendiente',
            'fecha' => now(),
            'idUsuario' => $usuario->id,
            'idServicio' => $dependencia->id,
            'idEmpleado' => $empleado->id,
        ]);

        return redirect()
            ->route('Turno.index')
            ->with('success', '¡Turno generado exitosamente para el usuario ' . $usuario->nombre. '!');
    }
}
