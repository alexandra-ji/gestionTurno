@extends('layouts.app')

@section('title')

crear Usuario
        
@endsection

@section('titleContent')
<h1 class="text-center">crear usuario</h1>
        
@endsection

@section('Content')

<div class="container">
    <div class="row">
        <div class="col">

        <a href="{{route('usuario.index')}}" class="btn btn-danger">volver</a>
        

        <form action="{{route('usuario.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tipoDocumento" class="form-label"> Tipo de Documento:</label>
                <input type="text" id="tipoDocumento" name="tipoDocumento" class="form-control">

            </div>

            <div class="mb-3">
                 <label for="numeroDocumento" class="form-label">Numero de Documento:</label>
                <input type="text" id="numeroDocumento" name="numeroDocumento" class="form-control">
            </div>
             <div class="mb-3">
                 <label for="nombre" class="form-label">Nombre del Usuario:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
             <div class="mb-3">
                 <label for="correo" class="form-label">Correo:</label>
                <input type="text" id="correo" name="correo" class="form-control">
            </div>
             <div class="mb-3">
                 <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control">
            </div>
             
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>
  
@endsection