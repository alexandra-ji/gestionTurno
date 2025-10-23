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
        $turnos = Turnos::all();
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        $empleados = Empleado::all();
        return view('Turnos.create', compact('turnos','usuarios', 'servicios', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurnoRequest $request)
    {
        Turnos::create(
                $request->all());
                return redirect()->route('Turno.index');   
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
        return view('Turnos.edit', compact('turnos' , 'empleados','usuarios','servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TurnoRequest $request, $id)
    {
       $turnos = Turnos::findorFail($id);
       $turnos->update($request->all());
       return redirect()->route('Turno.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $turnos = Turnos::findorFail($id);
        $turnos->delete();
        return redirect()->route('Turno.index');   
    }
}
