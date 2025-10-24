 @extends('layouts.app')

@section('title', 'Administrar Historial De Servicio')

@section('titleContent')
    <div class="bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <!-- Logo y título -->
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo"
                     style="height:60px;">
                <h2 class="m-0 fw-bold" style="color:#333;">GestionHistorialDeServicio</h2>
            </div>
            
            
        </div>

        <!-- Barra verde de navegación -->
        <div class="bg-success">
            <div class="container d-flex justif y-content-center gap-5 py-2">
                <a href="{{ route('welcome') }}" class="text-white fw-semibold text-decoration-none">Inicio</a>
                <a href="{{route('usuario.index')}}" class="text-white fw-semibold text-decoration-none">Usuarios </a>
                <a href="{{route('empleado.index')}}" class="text-white fw-semibold text-decoration-none">Empleados</a>
                <a href="{{route('dependencia.index')}}" class="text-white fw-semibold text-decoration-none">Dependencias</a>
            </div>
        </div>
    </div>

    {{-- TÍTULO DE LA SECCIÓN --}}
    <h3 class="text-center my-4 fw-bold" style="color:#333;">Administrar historial de Servicio</h3>
@endsection

@section('Content')
<div class="container mb-5">

    {{-- BOTONES SUPERIORES --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Botón Volver -->
        <a href="{{ route('welcome') }}"
           class="btn fw-bold px-4 shadow-sm"
           style="background-color:#333333; color:yellow; border-radius:8px;">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>

        <!-- Botón Crear -->
        <a href="{{route('Historial.create')}}"
           class="btn fw-bold px-4 shadow-sm"
           style="background-color:green; color:white; border-radius:8px;">
            <i class="bi bi-person-plus-fill"></i> Crear historialservicio
        </a>
    </div>

    {{-- TABLA DE $historialS --}}
    <div class="row">
        <div class="col-12">
            <div class="table-responsive rounded shadow-sm">
                <table class="table table-bordered align-middle text-center mb-0"
                       style="background-color:white; color:#333;">
                    <thead style="background-color:#a8e6a1; color:#333;">
                        <tr>
                            <th>ID</th>
                            <th>Fecha Salida</th>
                            <th>Turno</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historial as $historialS)
                        <tr>
                            <td>{{ $historialS->id }}</td>
                            <td>{{ $historialS->fechaSalida}}</td>
                            <td>{{$historialS->turno->codigoTurno}}</td>
                            
                            <td class="d-flex justify-content-center gap-2">
                                <!-- Botón Editar -->
                                <a href=""
                                   class="btn btn-sm fw-bold px-3 shadow-sm"
                                   style="background-color:green; color:white; border-radius:6px;">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <!-- Botón Eliminar (ROJO) -->
                                <form action="{{route('$historialS.destroy',$$historialS->id)}}" method="post">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-sm fw-bold px-3 shadow-sm"
                                            style="background-color:#dc3545; color:white; border-radius:6px;">
                                        <i class="bi bi-trash-fill"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
