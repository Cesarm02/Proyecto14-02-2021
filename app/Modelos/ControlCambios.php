<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ControlCambios extends Model
{
    protected $fillable = [
        'fecha_hora', 'descripcion', 'id_usuario'
    ];

}
