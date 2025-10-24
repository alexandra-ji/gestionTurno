<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turnos extends Model
{
    protected $table = 'turnos';

    protected $fillable = [
        'codigoTurno',
        'estadoTurno',
        'fecha',
        'horaInicio',
        'horaFin',
        'idUsuario',
        'idServicio',
        'idEmpleado',
       
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'idUsuario');
    }

     public function Servicio(){
        return $this->belongsTo(Servicio::class,'idServicio');
    }

     public function empleado(){
        return $this->belongsTo(Empleado::class,'idEmpleado');
    }

    public function historialServicio(){
        return $this->hasMany(HistorialServicio::class, 'idTurno');
    }
}
