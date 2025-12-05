<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistorialServicioRequest;
use App\Models\HistorialServicio;
use App\Models\Turnos;
use Illuminate\Http\Request;

class HistorialServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historial = HistorialServicio::all();
        return view ('HistorialServicio.index', compact('historial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $historial = HistorialServicio::all();
        $turnos = Turnos::all();
        return view('HistorialServicio.create',compact('historial','turnos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HistorialServicioRequest $request)
    {
        HistorialServicio::create(
            $request->all()
        );
        return redirect()->route('Historial.index')->with('success', 'Historial Servicio Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialServicio $historialServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $historial = HistorialServicio::findorFail($id);
        $turnos= Turnos::all();
        return view('HistorialServicio.edit', compact('historial', 'turnos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HistorialServicioRequest $request, $id)
    {
        $historial = HistorialServicio::findorFail($id);
        $historial ->update($request->all());
        return redirect()->route('Historial.index')->with('success', 'Historial Servicio Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $historial = HistorialServicio::findorFail($id);
        $historial->delete();
        return redirect()->route('Historial.index')->with('success', 'Historial Servicio Eliminado Correctamente');;

    }
}
