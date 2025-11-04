<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Dependencia;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('Servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dependencias = Dependencia::all();
        return view('Servicio.create', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicioRequest $request)
    {
        Servicio::create(
                $request->all());
                return redirect()->route('servicio.index')->with('success', 'Servicio creado correctamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $servicios = Servicio::findorFail($id);
        $dependencias = Dependencia::all();
        return view('Servicio.edit', compact('servicios' , 'dependencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicioRequest $request, $id)
    {
        $servicios = Servicio::findorFail($id);
        $servicios->update($request->all());
        return redirect()->route('servicio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $servicios = Servicio::findorFail($id);
        $servicios->delete();
        return redirect()->route('servicio.index')->with('success', 'Servicio Eliminado correctamente');
    }
}
