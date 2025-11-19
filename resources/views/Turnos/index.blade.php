@extends('layouts.app')

@section('title', 'Administrar Turnos')

@section('content_header')

{{-- TÍTULO DE LA SECCIÓN --}}
<h3 class="text-center my-4 fw-bold" style="color:#333;">Administrar Turnos</h3>

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
        <a href="{{route('Turno.create')}}"
            class="btn fw-bold px-4 shadow-sm"
            style="background-color:green; color:white; border-radius:8px;">
            <i class="bi bi-person-plus-fill"></i> Crear Turno
        </a>
    </div>

    {{-- TABLA DE TURNO --}}
    <div class="row">
        <div class="col-12">
            <div class="table-responsive rounded shadow-sm">
                <table class="table table-bordered align-middle text-center mb-0"
                    style="background-color:white; color:#333;">
                    <thead style="background-color:#a8e6a1; color:#333;">
                        <tr>
                            <th>ID</th>
                            <th>CodigoTurno</th>
                            <th>EstadoTurno</th>
                            <th>Fecha</th>
                            <th>HoraInicio</th>
                            <th>HoraFin</th>
                            <th>Usuario</th>
                            <th>Servicio</th>
                            <th>Empleado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turnos as $turno)
                        <tr>
                            <td>{{ $turno->id }}</td>
                            <td>{{ $turno->codigoTurno}}</td>
                            <td>{{ $turno->estadoTurno}}</td>
                            <td>{{ $turno->fecha}}</td>
                            <td>{{ $turno->horaInicio}}</td>
                            <td>{{ $turno->horaFin}}</td>
                            <td>{{$turno->usuario->numeroDocumento}}</td>
                            <td>{{$turno->servicio->nombreServicio}}</td>
                            <td>{{$turno->empleado->nombreCompleto}}</td>

                            <td class="d-flex justify-content-center gap-2">
                                <!-- Botón Editar -->
                                <a href="{{route('Turno.edit', $turno->id)}}"
                                    class="btn btn-sm fw-bold px-3 shadow-sm"
                                    style="background-color:green; color:white; border-radius:6px;">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                @if(session('success'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'success',
                                            title: '¡Éxito!',
                                            text: "{{ session('success') }}",
                                            confirmButtonText: 'Aceptar',
                                            timer: 3000
                                        });
                                    });
                                </script>
                                @endif
                                <!-- Botón Eliminar (ROJO) -->
                                <form action="{{route('Turno.destroy',$turno->id)}}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm fw-bold px-3 shadow-sm" onclick="confirmarEliminacion(event)"
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

<script>
    function confirmarEliminacion(event) {
        event.preventDefault();
        const form = event.target.closest('form');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection