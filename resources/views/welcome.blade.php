@extends('layouts.app')

@section('title')
    Bienvenido
@endsection

@section('titleContent')
    <div class="text-center my-5">
        <h1 class="fw-bold display-5">Panel de Control</h1>
        <p class="text-muted">Accede rápidamente a las secciones principales del sistema</p>
    </div>
@endsection

@section('Content')
<div class="container py-4">
    <div class="row g-4 justify-content-center">

        {{-- Tarjeta de Usuarios --}}
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                {{-- Imagen superior --}}
                <img src="{{ asset('imagenes/usuarios.jpg') }}" alt="Imagen de usuarios" class="card-img-top" style="height: 150px; object-fit: cover;">

                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Usuarios</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Administra, crea y edita los usuarios registrados en el sistema.
                    </p>
                    <a href="{{route('usuario.index')}}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                        Ver Usuarios
                    </a>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                {{-- Imagen superior --}}
                <img src="{{ asset('imagenes/dependenciaa.png') }}" alt="Imagen de usuarios" class="card-img-top" style="height: 150px; object-fit: cover;">

                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Dependencias</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Administra, crea y edita las dependencias registradas en el sistema.
                    </p>
                    <a href="{{route('dependencia.index')}}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                        Ver Dependencias
                    </a>
                </div>
            </div>
        </div>


        
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                {{-- Imagen superior --}}
                <img src="{{ asset('imagenes/empleadoss.jpg') }}" alt="Imagen de usuarios" class="card-img-top" style="height: 150px; object-fit: cover;">

                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Empleados</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Administra, crea y edita los Empleados Registrados en el sistema.
                    </p>
                    <a href="{{route('empleado.index')}}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                        Ver Empleados
                    </a>
                </div>
            </div>
        </div>



         <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
                {{-- Imagen superior --}}
                <img src="{{ asset('imagenes/servicioo.png') }}" alt="Imagen de usuarios" class="card-img-top" style="height: 150px; object-fit: cover;">

                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                    <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Servicios</h6>
                    <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                        Administra, crea y edita los Servicios Registrados en el sistema.
                    </p>
                    <a href="{{ route('servicio.index')}}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                        Ver Servicios
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
        {{-- Imagen superior --}}
        <img src="{{ asset('imagenes/EmpleadoDE.png') }}" alt="Imagen de EmpleadoDependencia" class="card-img-top" style="height: 150px; object-fit: cover;">

        <div class="card-body d-flex flex-column align-items-center text-center p-3">
            <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Empleado - Dependencia</h6>
            <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                Administra las relaciones entre empleados y sus dependencias dentro del sistema.
            </p>
            <a href="{{route('EmpleadoD.index') }}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                Ver Empleados-Dependencias
            </a>
        </div>
    </div>
</div>


<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
        {{-- Imagen superior --}}
        <img src="{{ asset('imagenes/turnos.png') }}" alt="Imagen de Turnos de Atención" class="card-img-top" style="height: 150px; object-fit: cover;">

        <div class="card-body d-flex flex-column align-items-center text-center p-3">
            <h6 class="card-title fw-bold mt-2 mb-2">Gestión de Turnos de Atención</h6>
            <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                Administra y organiza los turnos de atención al público para mejorar la experiencia de los usuarios en puntos de servicio.
            </p>
            <a href="{{route('Turno.index') }}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                Ver Turnos de Atención
            </a>
        </div>
    </div>
</div>


<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 0.9rem;">
        {{-- Imagen superior --}}
        <img src="{{ asset('imagenes/historial.png') }}" alt="Imagen de Turnos de Atención" class="card-img-top" style="height: 150px; object-fit: cover;">

        <div class="card-body d-flex flex-column align-items-center text-center p-3">
            <h6 class="card-title fw-bold mt-2 mb-2">Historial de Servicios</h6>
            <p class="card-text text-muted mb-3" style="font-size: 0.85rem;">
                Administra y organiza los turnos de atención al público para mejorar la experiencia de los usuarios en puntos de servicio.
            </p>
            <a href="{{route('Historial.index')}}" class="btn btn-sm btn-outline-success w-100 mt-auto">
                Ver Historial de Servicios
            </a>
        </div>
    </div>
</div>



@endsection
