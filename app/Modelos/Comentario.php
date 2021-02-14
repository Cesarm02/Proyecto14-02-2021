<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Comentario extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'titulo', 'imagen', 'categoria', 'descripcion', 'informacion_user_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo',
                'onUpdate' => true,
            ]
        ];
    }

    public function informacion_user()
    {
        return $this->belongsTo('App\Modelos\InformacionUser', 'informacion_user_id');
    }


    public function getGetExcerptAttribute()
    {
        //Extraer del body 140 paraemtros 
        return substr($this->descripcion, 0, 140);
    }
    
    //INFORMACIÖN NECESARIO PARA LOS COMENTARIOS * sin uso aún *

    public function getGetImagenAttribute()
    {
        if ($this->imagen) {
            return url("storage/$this->imagen");
        }
    }

}
