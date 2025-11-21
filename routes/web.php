<?php

use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoDependenciaController;
use App\Http\Controllers\HistorialServicioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Models\Turnos;

Route::get('/', function () {
    return view('welcome');
}) ->name('welcome');


//rutas para Usuarios


Route::get('/Usuarios/index',[UsuarioController::class,'index'])->name('usuario.index');
Route::get('/Usuarios/create',[UsuarioController::class,'create'])->name('usuario.create');
Route::post('/Usuarios/store',[UsuarioController::class,'store'])->name('usuario.store');
Route::post('/Usuarios/update/{id}',[UsuarioController::class,'update'])->name('usuario.update');
Route::get('/Usuarios/edit/{id}',[UsuarioController::class,'edit'])->name('usuario.edit');
Route::post('/Usuarios/destroy/{id}',[UsuarioController::class,'destroy'])->name('usuario.destroy');

//rutas para Dependencias


Route::get('/Dependencias/index',[DependenciaController::class,'index'])->name('dependencia.index');
Route::get('/Dependencias/create',[DependenciaController::class,'create'])->name('dependencia.create');
Route::post('/Dependencias/store',[DependenciaController::class,'store'])->name('dependencia.store');
Route::post('/Dependencias/update/{id}',[DependenciaController::class,'update'])->name('dependencia.update');
Route::get('/Dependencias/edit/{id}',[DependenciaController::class,'edit'])->name('dependencia.edit');
Route::post('/Dependencias/destroy/{id}',[DependenciaController::class,'destroy'])->name('dependencia.destroy');

//rutas para Empleados


Route::get('/Empleados/index',[EmpleadoController::class,'index'])->name('empleado.index');
Route::get('/Empleados/create',[EmpleadoController::class,'create'])->name('empleado.create');
Route::post('/Empleados/store',[EmpleadoController::class,'store'])->name('empleado.store');
Route::post('/Empleados/update/{id}',[EmpleadoController::class,'update'])->name('empleado.update');
Route::get('/Empleados/edit/{id}',[EmpleadoController::class,'edit'])->name('empleado.edit');
Route::post('/Empleados/destroy/{id}',[EmpleadoController::class,'destroy'])->name('empleado.destroy');


//rutas para Servicios


Route::get('/Servicios/index',[ServicioController::class,'index'])->name('servicio.index');
Route::get('/Servicios/create',[ServicioController::class,'create'])->name('servicio.create');
Route::post('/Servicios/store',[ServicioController::class,'store'])->name('servicio.store');
Route::post('/Servicios/update/{id}',[ServicioController::class,'update'])->name('servicio.update');
Route::get('/Servicios/edit/{id}',[ServicioController::class,'edit'])->name('servicio.edit');
Route::post('/Servicios/destroy/{id}',[ServicioController::class,'destroy'])->name('servicio.destroy');



//rutas para EmpleadoDependencia


Route::get('/EmpleadoDependencia/index',[EmpleadoDependenciaController::class,'index'])->name('EmpleadoD.index');
Route::get('/EmpleadoDependencia/create',[EmpleadoDependenciaController::class,'create'])->name('EmpleadoD.create');
Route::post('/EmpleadoDependencia/store',[EmpleadoDependenciaController::class,'store'])->name('EmpleadoD.store');
Route::post('/EmpleadoDependencia/update/{id}',[EmpleadoDependenciaController::class,'update'])->name('EmpleadoD.update');
Route::get('/EmpleadoDependencia/edit/{id}',[EmpleadoDependenciaController::class,'edit'])->name('EmpleadoD.edit');
Route::post('/EmpleadoDependencia/destroy/{id}',[EmpleadoDependenciaController::class,'destroy'])->name('EmpleadoD.destroy');


//rutas para Turnos


Route::get('/Turnos/index',[TurnosController::class,'index'])->name('Turno.index');
Route::get('/Turnos/create',[TurnosController::class,'create'])->name('Turno.create');
Route::post('/Turnos/store',[TurnosController::class,'store'])->name('Turno.store');
Route::post('/Turnos/update/{id}',[TurnosController::class,'update'])->name('Turno.update');
Route::get('/Turnos/edit/{id}',[TurnosController::class,'edit'])->name('Turno.edit');
Route::post('/Turnos/destroy/{id}',[TurnosController::class,'destroy'])->name('Turno.destroy');
Route::post('/turnos/{id}/llamar', [TurnosController::class, 'llamar'])->name('turnos.llamar');
Route::get('/turnos/llamar/{id}', [TurnosController::class, 'llamar'])->name('Turno.llamar');



//rutas para Historial de Servicios

Route::get('/Historial/index',[HistorialServicioController::class,'index'])->name('Historial.index');
Route::get('/Historial/create',[HistorialServicioController::class,'create'])->name('Historial.create');
Route::post('/Historial/store',[HistorialServicioController::class,'store'])->name('Historial.store');
Route::post('/Historial/update/{id}',[HistorialServicioController::class,'update'])->name('Historial.update');
Route::get('/Historial/edit/{id}',[HistorialServicioController::class,'edit'])->name('Historial.edit');
Route::post('/Historial/destroy/{id}',[HistorialServicioController::class,'destroy'])->name('Historial.destroy');



Route::get('/generar-turno', [TurnoController::class, 'mostrarFormulario'])->name('turno.form');

Route::post('/generar-turno', [TurnoController::class, 'generar'])->name('turno.generar');


Route::post('/turnos/atender/{id}', [TurnosController::class, 'atender'])->name('Turno.atender');
Route::post('/turnos/reasignar/{id}', [TurnosController::class, 'reasignar'])->name('Turno.reasignar');
Route::post('/turnos/cancelar/{id}', [TurnosController::class, 'cancelar'])->name('Turno.cancelar');

Route::get('/turnos/listar', [TurnosController::class, 'listar'])->name('Turno.listar');


Route::post('/turnos/mostrarAtencion/{id}', [TurnosController::class, 'mostrarAtencion'])->name('Turno.mostrarAtencion');
Route::post('/turnos/finalizarAtencion/{id}', [TurnosController::class, 'finalizarAtencion'])->name('Turno.finalizarAtencion');

Route::get('/tickeTurno/{codigoTurno}', function ($codigoTurno) {

    $turno = Turnos::where('codigoTurno', $codigoTurno)->first();

    return view('Turnos.TicketTurno',compact('turno'));
}) ->name('TicketTurno');




Route::get('/Tableroturno/', function () {
    // Turno actual (el primero pendiente)
    $turno = Turnos::where('estadoTurno', 'Pendiente')
        ->orderBy('created_at', 'asc')
        ->with(['servicio.dependencia', 'usuario'])
        ->first();

    // Todos los turnos en espera (pendientes)
    $turnosEnEspera = Turnos::where('estadoTurno', 'Pendiente')
        ->orderBy('created_at', 'asc')
        ->with(['servicio.dependencia', 'usuario'])
        ->get();

    // Turnos llamados recientemente (en atención) - CORREGIDO: 'En Atención' con tilde
    $turnosLlamados = Turnos::where('estadoTurno', 'En atención')
        ->orderBy('updated_at', 'desc')
        ->with(['servicio.dependencia', 'usuario'])
        ->limit(5)
        ->get();

    return view('Turnos.Tableroturno', compact(
        'turno',
        'turnosEnEspera',
        'turnosLlamados'
    ));
})->name('TableroTurno');
