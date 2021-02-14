<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
    protected $fillable = [
        'nombre', 'slug', 'descripcion',
        'informacion_user_id'
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Modelos\Role')->withTimestamps();
    }

    

}
