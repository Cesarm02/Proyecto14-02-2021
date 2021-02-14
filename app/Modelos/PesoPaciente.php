<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class PesoPaciente extends Model
{
    protected $fillable = [
        'fecha','peso','altura', 'informacion_user_id', 'imc', 'comentario'
    ];
    
    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }

}
