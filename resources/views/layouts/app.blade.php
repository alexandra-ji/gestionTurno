<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>@yield('title')</title>

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

    <!-- ✅ Título de página -->
    <div class="container mt-4">
        @yield('titleContent')
    </div>

    <!-- ✅ Contenido principal -->
    <div class="container my-3">
        <div class="row">
            @yield('Content')
        </div>
    </div>

   
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
