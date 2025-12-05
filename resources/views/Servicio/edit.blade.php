@extends('layouts.app')

@section('title', 'Editar Servicio')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            {{-- Texto GestionTurnos --}}
            <div>
                <h2 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold; margin:0;">
                    <span style="color:black;">Gestion</span>
                    <span style="color:#4CAF50;">Turnos</span>
                </h2>
            </div>

            {{-- Logo--}}
            <div>
                <img src="{{ asset('imagenes/logo.jpg') }}"
                     alt="Logo"
                     style="height:60px;">
            </div>
        </div>

        {{-- Título del formulario --}}
        <div class="text-center mb-3">
            <h5 class="fw-bold text-dark">EDITAR SERVICIOS</h5>
        </div>

        <form action="{{route('servicio.update', $servicios->id)}}" method="POST">
            @csrf

            {{-- Nombre Del Servicio--}}
            <div class="mb-3">
             <input type="text" name="nombreServicio" class="form-control form-control-sm"
             value="{{$servicios->nombreServicio}}"
                       placeholder="Nombre del Servicio" required>
            </div>

            {{-- Descripcion--}}
            <div class="mb-3">
                <input type="text" name="descripcion" class="form-control form-control-sm"
                value="{{$servicios->descripcion}}"
                       placeholder="Descripcion deL servicio" required>
            </div>


            <div>
                        <label for="Dependencia" class="form-label">Dependencia</label>
                        <select name="idDependencia" id="idDependencia" class="form-select">
                            @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}"
                            {{$servicios->idDependencia ==$dependencia->id ? 'selected': ''}} 
                            >{{$dependencia->nombre}}</option>
                            @endforeach
                        </select>
                    </div>



            {{-- Botón Actualizar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-sm py-2 fw-bold">
                    ACTUALIZAR
                </button>
            </div>

            {{-- Botón Volver --}}
            <div class="text-center mt-3">
                <a href="{{ route('servicio.index') }}"
                   class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
