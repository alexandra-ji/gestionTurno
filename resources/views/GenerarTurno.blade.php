@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="text-center mb-4">🎟️ Generar Turno</h2>

    {{-- Mostrar el turno generado --}}
    @isset($numeroTurno)
        <div class="alert text-center" style="background-color: white; border: 1px solid #ddd;">
            <p><strong>Número de Documento:</strong> {{ $documento }}</p>
            <p><strong>Dependencia:</strong> {{ $servicio }}</p>
            <h3 class="mt-3">Turno N° <span class="text-primary">{{ $numeroTurno }}</span></h3>
        </div>
    @endisset

    {{-- Formulario --}}
    <form action="{{ route('turno.generar')}}" method="POST" class="border rounded p-4 shadow-sm bg-light mt-4">
        @csrf

        <div class="mb-3">
            <label for="documento" class="form-label">Número de Documento</label>
            <input type="number" class="form-control @error('documento') is-invalid @enderror"
                   id="documento" name="documento" placeholder="Ingrese su número de documento">
            @error('documento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

      <div class="mb-3">
    <label for="dependencia" class="form-label">Dependencia</label>
    <select class="form-control @error('dependencia') is-invalid @enderror"
            id="dependencia" name="dependencia" required>
        <option value="">Seleccione una dependencia</option>
        @foreach($dependencias as $dep)
            <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
        @endforeach
    </select>
    @error('dependencia')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

  <button type="submit" class="btn btn-primary w-100">Generar</button>
    </form>
</div>
@endsection
