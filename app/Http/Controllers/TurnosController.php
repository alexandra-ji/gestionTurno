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
        $turnos = Turnos::all();
        return view('Turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
   {
    // Obtener el último turno ordenado por ID de forma descendente (el más reciente primero)
    $ultimoTurno = Turnos::orderBy('id', 'desc')->first();

    if ($ultimoTurno) {
        // Extraer solo la parte numérica del código, por ejemplo de "T010" obtiene "10"
        $ultimoNumero = (int) substr($ultimoTurno->codigoTurno, 1);

        // Incrementar el número para generar el siguiente código
        $nuevoNumero = $ultimoNumero + 1;
    } else {
        // Si no hay registros aún, comenzamos desde 1
        $nuevoNumero = 1;
    }

    // Generar el nuevo código con formato (T + número con ceros a la izquierda)
    $codigoTurno = 'T' . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);

    // Obtener los datos necesarios para los selects del formulario
    $usuarios = Usuario::all();
    $servicios = Servicio::all();
    $empleados = Empleado::all();

    // Enviar todas las variables a la vista
    return view('Turnos.create', compact('usuarios', 'servicios', 'empleados', 'codigoTurno'));
}
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        Turnos::create(
            $request->all()
        );
        return redirect()->route('Turno.index')->with('success', 'Turno creado correctamente');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Turnos $turnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $turnos = Turnos::findorFail($id);
        $empleados = Empleado::all();
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        return view('Turnos.edit', compact('turnos', 'empleados', 'usuarios', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, $id)
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
        $turnos = Turnos::findorFail($id);
        $turnos->delete();
        return redirect()->route('Turno.index')->with('success', 'turno  Eliminado correctamente');
    }
}
