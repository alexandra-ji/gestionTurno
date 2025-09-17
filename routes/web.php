<?php

use App\Http\Controllers\UsuarioController;
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

