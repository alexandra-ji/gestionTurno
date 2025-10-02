<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table  ="dependencias";
    protected $fillable =[
        'nombre',
        'descripcion'
    ];  

    public function Servicios(){
        return $this->hasMany(Servicio::class,'idDependencia');
    }
}
