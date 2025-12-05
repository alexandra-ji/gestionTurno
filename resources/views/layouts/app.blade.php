@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
@stop


@section('content')

{{-- Contenido principal --}}
<div class="container my-4">
    <div class="row justify-content-center">
        @yield('Content')
    </div>
</div>

{{-- Footer --}}
<footer class="text-center">
    <p class="text-muted mb-0">© {{ date('Y') }} SENA - Todos los derechos reservados</p>
</footer>

@stop


{{-- ========================== --}}
{{-- CSS               --}}
{{-- ========================== --}}
@section('css')

{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet">

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    rel="stylesheet">

{{-- DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">


{{-- Tus estilos personalizados --}}
<link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">

<style>
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
     
    table.dataTable thead th {
       background-color:green; color:white; border-radius:8pxt;
        color: white !important;
    }
</style>

@stack('styles')
@stop


{{-- ========================== --}}
{{-- JS                --}}
{{-- ========================== --}}
@section('js')

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

{{-- DataTables Responsive --}}
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

@stack('scripts')

@stop
