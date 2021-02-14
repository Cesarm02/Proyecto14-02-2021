<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CitasMedica extends Model
{
    protected $fillable = [
        "id", "title","descripcion","color","textColor","start","end","informacion_user_id"
    ];

    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }

}
