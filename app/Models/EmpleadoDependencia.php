<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoDependencia extends Model
{
    protected $table = 'empleado_dependencias';
    protected $fillable = [
        'idEmpleado',
        'idDependencia',

    ];

    public function Empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }

    public function Dependencia()
    {
        return $this->belongsTo(Dependencia::class , 'idDependencia');
    }
}
