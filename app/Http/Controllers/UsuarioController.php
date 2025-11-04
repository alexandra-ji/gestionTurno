<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('Usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        Usuario::create(
             request()->all());

             return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $usuarios = Usuario::findorFail($id);
         return view('Usuario.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request,$id)
    {
        $usuarios = Usuario::findorFail($id);
        $usuarios->update($request->all()); 

        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $usuarios = Usuario::findorFail($id);
        $usuarios->delete();

        return redirect()->route('usuario.index')->with('success', 'Usuario Eliminado  correctamente');;
        
    }
}
