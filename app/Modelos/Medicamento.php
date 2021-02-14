<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = [
        'nombre', 'cantidad', 'administracion','medico', 'especialidad', 'horario',
         'hora_inicio', 'informacion_user_id','estado','comentario'
    ];

    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }

}
