@extends('layouts.app')

@section('title')
        
@endsection

@section('titleContent')
<h1 class="text-center">Administrar Usuarios</h1>   
@endsection

@section('Content')
  
  

<div class="container">
       <a href="{{ route('usuario.create') }}" class="btn btn-primary">crear un nuevo usuario </a>
    <div class="row">
        
            <table class="table">
                <thead>
                    <tr>
                     <th>id</th>
                     <th>Tipo de Documento</th>
                     <th>Numero De Documento</th>
                     <th>Nombre</th>
                     <th>Correo</th>
                     <th>Telefono</th>
                     <th>Opciones</th>
                   </tr> 
                    
                </thead>
            
            <tbody>

                @foreach($usuario  as $usuarios)
                <tr>
                    <td>{{$usuarios->id}}</td>
                    <td>{{$usuarios->tipoDocumento}}</td>
                    <td>{{$usuarios->numeroDocumento }}</td>
                    <td>{{$usuarios->nombre}}</td>
                    <td>{{$usuarios->correo}}</td>
                    <td>{{$usuarios->telefono}}</td>
                    <td>
                        <a href="{{route('usuario.edit',$usuarios->id)}}" class="btn btn-success">Editar</a>
                        
                        <form action="{{route('usuario.destroy',$usuarios->id)}}"  method="post">
                          @csrf

                          <button class="btn btn-danger" > Eliminar </button>

                          </form>
                        
                    </td> 
                </tr>
                @endforeach

           
            </tbody>
        </table>
  
    </div>
      <a href="{{route('welcome')}}" class="btn btn-info"> volver </a>
  </div>

@endsection