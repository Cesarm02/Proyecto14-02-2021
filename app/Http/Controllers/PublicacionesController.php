<?php

namespace App\Http\Controllers;

use App\Modelos\Comentario;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use App\Modelos\InformacionUser;
use Illuminate\Support\Facades\Storage;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'articulos.index');
        $info = InformacionUser::where('user_id', auth()->user()->id)->get();
        // dd($info[0]->id);
        $articulos = Comentario::where('informacion_user_id', $info[0]->id)->get();
        return view('articulos.index', compact('articulos'));
        // dd($articulos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('haveaccess', 'articulos.create');
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('haveaccess', 'articulos.store');
        $request->validate([
            'titulo' => 'required|max: 120',
            'descripcion' => 'required',
        ]);

        $articulos = Comentario::create([
            'informacion_user_id' => auth()->user()->id
        ] + $request->all());

        if($request->file('file'))
        {
            $articulos->imagen = $request->file('file')->store('articulos', 'public');
            $articulos->save();
        }

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->id . ' en la tabla comentarios',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('publicaciones.index')
        ->with('status_success', 'articulo guardado correctamente');    
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->authorize('haveaccess', 'articulos.edit');
        $comentario = Comentario::find($id);
        if($comentario == null)
        {
            return response()->view("errors.404", [], 404);
        }
        
        // dd($comentario->informacion_user_id);
        // dd(auth()->user()->id);
        if($comentario->informacion_user_id == auth()->user()->id){
            return view('articulos.edit', compact('comentario'));
        }else{
            return response()->view("errors.404", [], 404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->authorize('haveaccess', "articulos.edit");
        $comentario = Comentario::where('id', $id)->get();
        $comentario[0]->update($request->all());

        if ($request->file('file')) {
            //Elimina
            Storage::disk('public')->delete($comentario[0]->imagen);

            $comentario[0]->imagen = $request->file('file')->store('articulos', 'public');
            $comentario[0]->save();
        }

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $id . ' en la tabla comentarios',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('publicaciones.index')
        ->with('status_success', 'Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('haveaccess', "articulos.edit");
        $comentario = Comentario::find($id);
        //Elimina
        Storage::disk('public')->delete($comentario->imagen);

        $comentario->delete();

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla comentarios',
            'id_usuario' => Auth()->user()->id
        ]);
        
        return redirect()->route('publicaciones.index')
        ->with('status_success', 'Eliminado correctamente');
    }
}
