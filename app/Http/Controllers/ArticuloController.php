<?php

namespace App\Http\Controllers;

use App\Modelos\Comentario;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    //

    public function articulo()
    {
        return view('articulos.articulo',[
            'articulos' => Comentario::with('informacion_user')->where('categoria','<>','general')->latest()->paginate(5)
        ]);
    }

    public function medicamentos()
    {
        return view('articulos.medicamentos', [
            'articulos' => Comentario::with('informacion_user')->where('categoria', 'medicamentos')->latest()->paginate(5)
        ]);
    }

    public function glucometrias()
    {
        return view('articulos.glucometrias', [
            'articulos' => Comentario::with('informacion_user')->where('categoria', 'glucometrias')->latest()->paginate(5)
        ]);
    }

    public function ejercicio()
    {
        return view('articulos.ejercicio', [
            'articulos' => Comentario::with('informacion_user')->where('categoria', 'ejercicio')->latest()->paginate(5)
        ]);
    }

    public function Comidas()
    {
        return view('articulos.comidas', [
            'articulos' => Comentario::with('informacion_user')->where('categoria', 'comidas')->latest()->paginate(5)
        ]);
    }

    public function articulos($id)
    {
        $articulos = Comentario::find($id);
 
        if($articulos == null){
            return response()->view("errors.404", [], 404);
        }

        // dd($articulos[0]->titulo);
        return view('articulos.articulos', compact('articulos'));
    }

}
