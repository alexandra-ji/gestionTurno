<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
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
        return view('Turnos.create', compact('turnos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Turnos::create(
                $request->all());
                return redirect()->route('turnos.index');   
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
        $empleados = Turnos::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turnos $turnos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turnos $turnos)
    {
        //
    }
}
