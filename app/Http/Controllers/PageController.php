<?php

namespace App\Http\Controllers;

use App\Modelos\Comentario;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function posts()
    {
        return view('diabetes.index', [
            'posts' => Comentario::orderBy('id', 'Asc')->where('categoria','general')->paginate(5)]);
    }

    public function crear()
    {
        $this->authorize('haveaccess', "diabetes.create");
        return view('diabetes.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'    => 'required|max:50',
            'descripcion'      => 'required',
        ]);
        
        $post = Comentario::create([
            'categoria' => 'general',
            'informacion_user_id' => auth()->user()->id
        ] + $request->all());

        //Imagen
        if ($request->file('file')) {
            $post->imagen = $request->file('file')->store('diabetes', 'public');
            $post->save();
        }

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->id . ' en la tabla comentarios',
            'id_usuario' => Auth()->user()->id
        ]);

        //retornar
        return redirect()->route('diabetes')
        ->with('status_success', 'articulo guardado correctamente');
    }

    public function edit($id)
    {
        $this->authorize('haveaccess', "diabetes.edit");

        $comentario = Comentario::find($id);
        if ($comentario == null) {
            return response()->view("errors.404", [], 404);
        }
        // dd($comentario[0]->titulo);



        return view('diabetes.edit', compact('comentario'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('haveaccess', "diabetes.edit");
        $comentario = Comentario::where('id', $id)->get();
        $comentario[0]->update($request->all());

        if($request->file('file')){
            //Elimina
            Storage::disk('public')->delete($comentario[0]->imagen);

            $comentario[0]->imagen = $request->file('file')->store('diabetes', 'public');
            $comentario[0]->save();
        }

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $id . ' en la tabla comentarios',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('diabetes')
        ->with('status_success', 'Editado correctamente');

    }

    public function destroy($id)
    {
        $this->authorize('haveaccess', "diabetes.edit");
        $comentario = Comentario::where('id', $id)->get();
        //Elimina
        Storage::disk('public')->delete($comentario[0]->imagen);

        $comentario[0]->delete();

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla comentarios',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('diabetes')
        ->with('status_success', 'Eliminado correctamente');
    }
}
