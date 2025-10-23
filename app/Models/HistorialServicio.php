<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialServicio extends Model
{
    protected $table= 'historial_servicios';
    protected $fillable = [
        'fechaSalida',
        'idTurno',
    ];

    public function turno(){
        return $this->belongsTo(Turnos::class,'idTurno');
        
    }
}
