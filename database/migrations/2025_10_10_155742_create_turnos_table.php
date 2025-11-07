<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('codigoTurno');
            $table->string('estadoTurno');
            $table->dateTime('fecha')->default(DB::raw('CURRENT_DATE'));
            $table->time('horaInicio')->nullable();
            $table->time('horaFin')->nullable();
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->unsignedBigInteger('idServicio');
            $table->foreign('idServicio')->references('id')->on('servicios');
            $table->unsignedBigInteger('idEmpleado');
            $table->foreign('idEmpleado')->references('id')->on('empleados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
