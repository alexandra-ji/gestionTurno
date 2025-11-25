@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
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

    {{-- ✅ DataTables CSS + Bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

    <style>
        /* Verde institucional SENA */
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

    {{-- Contenido principal del layout --}}
    <div class="container my-4">
        <div class="row justify-content-center">
            @yield('Content')
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center">
        <p class="text-muted mb-0">© {{ date('Y') }} SENA - Todos los derechos reservados</p>
    </footer>

    {{-- ===================== --}}
    {{--  SCRIPTS NECESARIOS   --}}
    {{-- ===================== --}}

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>

    {{-- jQuery (OBLIGATORIO para DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

    {{-- DataTables Responsive --}}
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    {{-- Inicializar DataTable --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if ($('#myTable').length) {
                $('#myTable').DataTable({
                    responsive: true,
                    autoWidth: false,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                    }
                });
            }
        });
    </script>

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
