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
       
    ];

    public function Usuarios(){
        return $this->belongsTo(Usuario::class,'idTurno');
    }

     public function Servicios(){
        return $this->belongsTo(Servicio::class,'idTurno');
    }

     public function Empleados(){
        return $this->belongsTo(Empleado::class,'idTurno');
    }
}
