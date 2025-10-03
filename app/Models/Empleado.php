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


    public function EmpleadoDependencias()
    {
        return $this->hasMany(EmpleadoDependencia::class, 'idEmpleado');
    }
}
