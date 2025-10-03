<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\Empleado;
use App\Models\EmpleadoDependencia;
use Illuminate\Http\Request;

class EmpleadoDependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $EmpleadoDe = EmpleadoDependencia::all();
        return view('EmpleadoDependencia.index', compact('EmpleadoDe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $empleados = Empleado::all();
    $dependencias =Dependencia::all();

    return view('EmpleadoDependencia.create', compact('empleados', 'dependencias'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        EmpleadoDependencia::create(
            $request->all());
            return redirect()->route('EmpleadoD.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmpleadoDependencia $empleadoDependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $EmpleadoDe = EmpleadoDependencia::findorFail($id);
        $empleados = Empleado::all();
        $dependencias =Dependencia::all();
        return view('EmpleadoDependencia.edit', compact('EmpleadoDe','empleados', 'dependencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $EmpleadoDe = EmpleadoDependencia::findorFail($id);
        $EmpleadoDe->update($request->all());

        return redirect()->route('EmpleadoD.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $EmpleadoDe = EmpleadoDependencia::findorFail($id);
        $EmpleadoDe->delete();
        return redirect()->route('EmpleadoD.index');
    }
}
