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
    // Validar los campos del formulario
    $request->validate([
        'documento' => 'required|numeric',
        'dependencia' => 'required|exists:dependencias,id',
    ]);

    // Obtener la dependencia seleccionada
    $dependencia = \App\Models\Dependencia::find($request->dependencia);

    // Obtener la letra inicial de la dependencia
    $letra = strtoupper(substr($dependencia->nombre, 0, 1));

    // Buscar el último turno de esa dependencia
    $ultimoTurno = \App\Models\Turnos::where('idServicio', $dependencia->id)
                    ->orderBy('id', 'desc')
                    ->first();

    if ($ultimoTurno) {
        $ultimoNumero = (int) substr($ultimoTurno->codigoTurno, 1);
        $nuevoNumero = $ultimoNumero + 1;
    } else {
        $nuevoNumero = 1;
    }

    // Generar nuevo código
    $numeroTurno = $letra . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);

    // Crear el turno en la base de datos
    $turno = \App\Models\Turnos::create([
        'codigoTurno' => $numeroTurno,
        'estadoTurno' => 'Pendiente', // puedes cambiarlo según tu lógica
        'fecha' => now()->toDateString(),
        'horaInicio' => now()->format('H:i:s'),
        'idUsuario' => null, // o asigna si hay usuario logueado
        'idServicio' => $dependencia->id,
        'idEmpleado' => null, // o asigna si corresponde
    ]);

    // Devolver la vista con el ticket generado
    return view('GenerarTurno', [
        'numeroTurno' => $turno->codigoTurno,
        'documento' => $request->documento,
        'servicio' => $dependencia->nombre,
        'dependencias' => \App\Models\Dependencia::all(),
    ]);
}

}
