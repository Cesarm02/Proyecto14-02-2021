<?php

namespace App\Modelos;


use Illuminate\Database\Eloquent\Model;

class ResumenCeg extends Model
{
    protected $fillable = [
        'fecha', 'tipo', 'hora', 'tiempo_ejercicio','tipo_ejercicio',
         'valor_glucometria', 'descripcion', 'informacion_user_id','categoria','tipo_hora'
    ];

    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }
}
