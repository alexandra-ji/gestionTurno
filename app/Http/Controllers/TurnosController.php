<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurnoRequest;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Models\Turnos;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Solo mostrar turnos pendientes o reasignados por orden de llegada
        $turnos = Turnos::whereIn('estadoTurno', ['Pendiente', 'Reasignado'])
                        ->orderBy('fecha', 'asc')
                        ->orderBy('horaInicio', 'asc')
                        ->get();

        return view('Turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener el último turno ordenado por ID de forma descendente (el más reciente primero)
        $ultimoTurno = Turnos::orderBy('id', 'desc')->first();

        if ($ultimoTurno) {
            // Extraer la parte numérica del código, ej. "T010" → 10
            $ultimoNumero = (int) substr($ultimoTurno->codigoTurno, 1);
            $nuevoNumero = $ultimoNumero + 1;
        } else {
            $nuevoNumero = 1;
        }

        // Generar nuevo código (T + número con ceros)
        $codigoTurno = 'T' . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);

        // Obtener los datos para los selects del formulario
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        $empleados = Empleado::all();

        return view('Turnos.create', compact('usuarios', 'servicios', 'empleados', 'codigoTurno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Turnos::create($request->all());
        return redirect()->route('Turno.index')->with('success', 'Turno creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $turnos = Turnos::findOrFail($id);
        $empleados = Empleado::all();
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        return view('Turnos.edit', compact('turnos', 'empleados', 'usuarios', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $turnos = Turnos::findOrFail($id);
        $turnos->update($request->all());
        return redirect()->route('Turno.index')->with('success', 'Turno actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $turnos = Turnos::findOrFail($id);
        $turnos->delete();
        return redirect()->route('Turno.index')->with('success', 'Turno eliminado correctamente');
    }

    /**
     * Métodos personalizados para cambiar el estado del turno
     */
    public function llamar($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->estadoTurno = 'Llamado';
        $turno->save();

        return redirect()->route('Turno.index')->with('success', 'Turno llamado correctamente.');
    }

    public function atender($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->estadoTurno = 'En Atención';
        $turno->save();

        return redirect()->route('Turno.index')->with('success', 'Turno en atención.');
    }

    public function cancelar($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->estadoTurno = 'Cancelado';
        $turno->save();

        return redirect()->route('Turno.index')->with('success', 'Turno cancelado.');
    }

    public function reasignar($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->estadoTurno = 'Reasignado';
        $turno->save();

        return redirect()->route('Turno.index')->with('success', 'Turno reasignado.');
    }
}
