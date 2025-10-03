<?php

use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoDependenciaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

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


