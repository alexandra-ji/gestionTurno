<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombreServicio',
        'descripcion',
        'idDependencia',

    ];

    public function Dependencia(){
        return $this->belongsTo(Dependencia::class,'idDependencia');
}

}
