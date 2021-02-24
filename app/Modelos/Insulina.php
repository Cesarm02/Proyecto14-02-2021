<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Insulina extends Model
{
    protected $fillable = [
        'nombre', 'fecha', 'hora', 'cantidad', 'tipo', 'estado', 'comentarios', 'informacion_user_id', 'pico', 'inicio', 'duracion', 'concentracion'
    ];

    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }

}
