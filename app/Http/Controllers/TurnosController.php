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
    { {
            // Trae todos los turnos, sin importar el estado
            $turnos = Turnos::with(['usuario', 'servicio', 'empleado'])->get();

            return view('Turnos.index', compact('turnos'));
        }
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
    public function store(TurnoRequest $request)
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
    public function update(TurnoRequest $request, $id)
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


    public function llamar($id)
    {
        $turno = Turnos::findOrFail($id);
        return view('Turnos.llamar', compact('turno'));
    }

    public function atender($id)
    {
        // Buscar el turno en la base de datos
        $turno = \App\Models\Turnos::findOrFail($id);

        // Actualizar estado y hora de inicio
        $turno->estadoTurno = 'En atención';
        $turno->horaInicio = now()->format('H:i:s');
        // Guardar los cambios
        $turno->update();
        // Redirigir con mensaje de éxito
        return redirect()->route('Turno.index')->with('success', '✅ El turno ha sido atendido. Hora de inicio registrada correctamente.');
    }

    public function reasignar($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->estadoTurno = 'Reasignado';
        $turno->save();

        return redirect()->route('Turno.index')->with('success', 'Turno reasignado correctamente.');
    }

    public function cancelar($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->estadoTurno = 'Cancelado';
        $turno->horaFin = now()->format('H:i:s');
        $turno->save();

        return redirect()->route('Turno.listar')->with('success', 'Turno cancelado correctamente.');
    }

    public function listar()

    {
        $turnos = Turnos::with(['usuario', 'servicio', 'empleado'])
            ->whereIn('estadoTurno', ['Pendiente', 'Reasignado'])
            ->orderBy('fecha', 'asc')
            ->orderBy('horaInicio', 'asc')
            ->get();

        return view('Turnos.ListarTurnos', compact('turnos'));
    }

    public function mostrarAtencion($id)
{
    // Carga el turno con relaciones si las tienes (cliente, servicio, etc.)
$turno = Turnos::with(['usuario', 'Servicio', 'empleado'])->findOrFail($id);
    // Si no tiene horaInicio, la guardamos al momento de abrir la vista
    if (!$turno->horaInicio) {
        $turno->horaInicio = now()->format('H:i:s');
        $turno->estadoTurno = 'En atención';
        $turno->save();
    }

    return view('turnos.AtenderTurno', compact('turno'));
}

public function finalizarAtencion($id)
{
    $turno = Turnos::findOrFail($id);

    // Guardar hora final y estado
    $turno->horaFin = now()->format('H:i:s');
    $turno->estadoTurno = 'Atendido';
    $turno->save();

    return redirect()->route('Turno.index')
        ->with('success', 'Turno finalizado correctamente.');
}


}
