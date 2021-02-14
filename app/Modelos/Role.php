<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'nombre', 'slug', 'descripcion','acceso',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function permisos()
    {
        return $this->belongsToMany('App\Modelos\Permiso')->withTimestamps();

    }
}
