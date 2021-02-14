<?php

namespace app\Traits;

trait UserTrait{

    //Evento para cuando crea un usuario
    protected static function boot()
    {
        parent::boot();
        //Asignar la informacion del usuario
        static::created(function($user){
            $user->informacion_user()->create();
            // $user->informacion_paciente()->create();
        });
    }


    public function roles()
    {
        return $this->belongsToMany('App\Modelos\Role')->withTimestamps();
    }

    public function havePermission($permiso)
    {

        foreach ($this->roles as $role) {
            if ($role['acceso'] == 'si') {
                return true;
            }

            foreach ($role->permisos as $perm) {
                if ($perm->slug == $permiso) {
                    return true;
                }
            }
        }

        return false;
        // return $this->roles;

    }

    public function informacion_user()
    {
        return $this->hasMany('App\Modelos\InformacionUser');
    }

}