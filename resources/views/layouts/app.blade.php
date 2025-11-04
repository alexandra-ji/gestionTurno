@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
    <h1>@yield('page-title', 'Admin Panel')</h1>
@stop

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ✅ Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          crossorigin="anonymous">

    {{-- ✅ Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* ✅ Verde institucional SENA */
        .btn-sena {
            background-color: #39A900;
            color: white;
        }
        .btn-sena:hover {
            background-color: #2e8600;
            color: white;
        }
        footer {
            background: #f1f1f1;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    {{-- ✅ Contenido principal dentro del layout AdminLTE --}}
    <div class="container my-4">
        <div class="row justify-content-center">
            @yield('Content')
        </div>
    </div>

    {{-- ✅ Footer opcional --}}
    <footer class="text-center">
        <p class="text-muted mb-0">© {{ date('Y') }} SENA - Todos los derechos reservados</p>
    </footer>

    {{-- ✅ Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    @stack('styles')
@stop

@section('js')
    @stack('scripts')
@stop
