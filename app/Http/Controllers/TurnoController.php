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
        // 1️⃣ Validar los datos
        $request->validate([
            'documento' => 'required|numeric',
            'dependencia' => 'required|exists:dependencias,id',
        ]);

        // 2️⃣ Obtener la dependencia
        $dependencia = Dependencia::find($request->dependencia);

        // 3️⃣ Generar el código del turno
        $letra = strtoupper(substr($dependencia->nombre, 0, 1));
        $ultimoTurno = Turnos::where('idServicio', $dependencia->id)
                            ->orderBy('id', 'desc')
                            ->first();
        $nuevoNumero = $ultimoTurno ? (int) substr($ultimoTurno->codigoTurno, 1) + 1 : 1;
        $codigoTurno = $letra . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);

        // 4️⃣ Buscar o crear el usuario
        $usuario = Usuario::where('numeroDocumento', $request->documento)->first();

        if (!$usuario) {
            // Si no existe, lo creamos automáticamente
            $usuario = Usuario::create([
                'nombre' => 'Usuario ' . $request->documento,
                'numeroDocumento' => $request->documento,
                'telefono' => 'No registrado',
                'correo' => 'sincorreo' . $request->documento . '@example.com',
            ]);
        }

        // 5️⃣ Seleccionar un empleado aleatorio de la dependencia
        $empleado = $dependencia->empleados()->inRandomOrder()->first();

        if (!$empleado) {
            return back()->withErrors(['dependencia' => 'No hay empleados asignados a esta dependencia.']);
        }

        // 6️⃣ Crear el turno
        Turnos::create([
            'codigoTurno' => $codigoTurno,
            'estadoTurno' => 'Pendiente',
            'fecha' => now()->toDateString(),
            'horaInicio' => now()->format('H:i:s'),
            'idUsuario' => $usuario->id,
            'idServicio' => $dependencia->id,
            'idEmpleado' => $empleado->id,
        ]);

        // 7️⃣ Redirigir con mensaje
        return redirect()
            ->route('Turno.index')
            ->with('success', '¡Turno generado exitosamente para el usuario ' . $usuario->nombre. '!');
    }
}
