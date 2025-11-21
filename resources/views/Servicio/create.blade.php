@extends('layouts.app')

@section('title', 'Crear Servicio')

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
            <h5 class="fw-bold text-dark">REGISTRO DE SERVICIOS</h5>
        </div>

        <form action="{{route('servicio.store')}}" method="POST">
            @csrf

            {{-- Nombre Del Servicio--}}
            <div class="mb-3">

                <input type="text" name="nombreServicio" class="form-control form-control-sm  @error('nombreServicio') is-invalid @enderror"
                    placeholder="Nombre del Servicio">
                @error('nombreServicio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Descripcion--}}
            <div class="mb-3">
                <input type="text" name="descripcion" class="form-control form-control-sm   @error('descripcion') is-invalid @enderror"
                    placeholder="Descripcion deL servicio">

                @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Dependencia --}}
            <div class="mb-3">
                <label for="idDependencia" class="form-label  fw-semibold">Dependencia</label>
                <select name="idDependencia" id="idDependencia" class="form-select @error('Dependencia') is-invalid @enderror">
                    @foreach($dependencias as $dependencia)
                    <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                    @endforeach
                </select>

                @error('Dependencia')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botón Guardar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-sm py-2 fw-bold">
                    GUARDAR
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