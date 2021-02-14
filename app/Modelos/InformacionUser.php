<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class InformacionUser extends Model
{
    protected $fillable = [
        'nombre', 'apellidos', 'tipo_documento', 'dni', 'celular', 'profesion', 'email', 
        
    ];


    public function acudiente()
    {
        return $this->hasMany('App\Modelos\Acudiente');
    }

    public function antecedentes_personales()
    {
        return $this->hasOne('App\Modelos\AntecedentesPersonale');
    }

    public function cita_medica()
    {
        return $this->hasMany('App\Modelos\CitaMedica');
    }

    public function comentario()
    {
        return $this->hasMany('App\Modelos\Comentario');
    }

    // public function informacion_paciente()
    // {
    //     return $this->hasOne('App\Modelos\InformacionPaciente');
    // }

    public function insulina()
    {
        return $this->hasMany('App\Modelos\Insulina');
    }

    public function medicamento()
    {
        return $this->hasMany('App\Modelos\Medicamento');
    }

    public function peso_paciente()
    {
        return $this->hasOne('App\Modelos\PesoPaciente');
    }

    public function resumen_ceg()
    {
        return $this->hasMany('App\Modelos\ResumenCeg');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
