@extends('layouts.app')

@section('title', 'Crear Turno')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:850px; background:white; border-radius:8px;">

        {{-- ENCABEZADO --}}
        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            <h2 class="fw-bold m-0">
                <span style="color:black;">Gestion</span>
                <span style="color:#4CAF50;">Turnos</span>
            </h2>

            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" style="height:60px;">
        </div>

        <h5 class="fw-bold text-center mb-4">REGISTRO DE TURNOS</h5>

        <form action="{{ route('Turno.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- COLUMNA IZQUIERDA --}}
                <div class="col-md-6">

                    {{-- Código Del Turno --}}
                    <div class="mb-3">
                        <label for="codigoTurno" class="form-label">Código Turno</label>
                        <input type="text" class="form-control" id="codigoTurno" name="codigoTurno"
                            value="{{ $codigoTurno }}" readonly>
                    </div>

                    {{-- Servicio --}}
                    <div class="mb-3">
                        <label class="form-label">Servicio</label>
                        <select name="idServicio" class="form-select  @error('idServicio') is-invalid @enderror">
                            <option value="">Seleccione un servicio</option>
                            @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombreServicio }}</option>
                            @endforeach
                        </select>
                         @error('idServicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Usuario --}}
                    <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <select name="idUsuario" class="form-select @error('idUsuario') is-invalid @enderror">
                            <option value="">Seleccione un usuario</option>
                            @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->numeroDocumento }}</option>
                            @endforeach
                        </select>
                              @error('idUsuario')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                     {{-- Hora Inicio --}}
                    <div class="mb-3">
                        <label class="form-label">Hora Inicio</label>
                        <input type="time" name="horaInicio"
                            class="form-control @error('horaInicio') is-invalid @enderror">
                        @error('horaInicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>









                </div>


                {{-- COLUMNA DERECHA --}}
                <div class="col-md-6">

                    {{-- Estado --}}
                    <div class="mb-3">
                        <label for="estadoTurno" class="form-label">Estado del Turno</label>
                        <select name="estadoTurno" class="form-select @error('estadoTurno') is-invalid @enderror">
                            <option value="">Seleccione el estado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Atención">En Atención</option>
                            <option value="Atendido">Atendido</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="Ausente">Ausente</option>
                            <option value="Reasignado">Reasignado</option>
                        </select>
                        @error('estadoTurno')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    {{-- Fecha --}}
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="datetime-local" name="fecha"
                            class="form-control @error('fecha') is-invalid @enderror">
                        @error('fecha')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    
                    {{-- Empleado --}}
                    <div class="mb-3">
                        <label class="form-label">Empleado</label>
                        <select name="idEmpleado" class="form-select @error('idEmpleado') is-invalid @enderror">
                            <option value="">Seleccione un empleado</option>
                            @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id }}">{{ $empleado->nombreCompleto }}</option>
                            @endforeach
                        </select>
                            @error('idEmpleado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- Hora Fin --}}
                    <div class="mb-3">
                        <label class="form-label">Hora Fin</label>
                        <input type="time" name="horaFin"
                            class="form-control @error('horaFin') is-invalid @enderror">
                        @error('horaFin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

            </div>

            {{-- BOTONES --}}
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-success py-2 fw-bold">GUARDAR</button>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('Turno.index') }}" class="btn btn-link text-danger fw-semibold">
                    ← Volver
                </a>
            </div>

        </form>
    </div>
</div>
@endsection