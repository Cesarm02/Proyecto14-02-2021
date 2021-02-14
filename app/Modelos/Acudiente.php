<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    protected $fillable = [
        'nombres', 'apellidos','parentesco','celular', 'informacion_user_id'
    ];

    public function informacion_user(){
        return $this->belongsTo('App\Modelos\Informacion_User', 'informacion_user_id');
    }

}
