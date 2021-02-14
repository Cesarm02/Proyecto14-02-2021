<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPersonale extends Model
{
    protected $fillable = [
        'tipo', 'fecha_diagnostico','descripcion', 'informacion_user_id'
    ];
    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }
}
