<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    
    protected $fillable = [
        'nombreCompleto',
        'numeroDocumento',
        'telefono',
        'correo',
    ];


   public function dependencias()
{
    return $this->belongsToMany(
        Dependencia::class,
        'empleado_dependencias',
        'idEmpleado',
        'idDependencia'
    );
}
    public function Turnos()
    {
        return $this->hasMany(Turnos::class, 'idEmpleado');

    }


}
