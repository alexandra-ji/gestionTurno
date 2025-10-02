<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dependencias = Dependencia::all();
        return view('Dependencia.index', compact('dependencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dependencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dependencia::create(
             $request->all());

             return redirect()->route('dependencia.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dependencia $dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $dependencias= Dependencia::findorFail($id);
        return view('Dependencia.edit', compact('dependencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dependencias= Dependencia::findorFail($id);
        $dependencias->update($request->all());

        return redirect()->route('dependencia.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $dependencias = Dependencia ::findorFail($id);
        $dependencias->delete();

         return redirect()->route('dependencia.index');


    }
}
