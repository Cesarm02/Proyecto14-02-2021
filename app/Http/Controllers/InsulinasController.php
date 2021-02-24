<?php

namespace App\Http\Controllers;

use App\Modelos\Insulina;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Auth;

class InsulinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'insulinas.index');
        $usuario = Auth::user()->id;
        $insulinas = Insulina::where('informacion_user_id', $usuario)->get();
        return view('insulinas.index', compact('insulinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('haveaccess', 'insulinas.create');
        return view('insulinas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('haveaccess', 'insulinas.store');

        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'estado'  => 'required',
        ]);

        $insulina = Insulina::create([
            'informacion_user_id' => auth()->user()->id
        ]+ $request->all());
        
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla inslinas',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('insulinas.index')
        ->with('status_success', 'Insulina agregada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->authorize('haveaccess', 'insulinas.show');
        $insulina = Insulina::findOrFail($id);
        return view('insulinas.show', compact('insulina'));

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
        $this->authorize('haveaccess', 'insulinas.edit');
        $insulina = Insulina::findOrFail($id);
        return view('insulinas.edit', compact('insulina'));
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
        $this->authorize('haveaccess', 'insulinas.update');

        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'estado'  => 'required',
        ]);

        $insulina = Insulina::findOrFail($id);
        $insulina->update($request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $insulina['id'] . ' en la tabla insulinas',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('insulinas.index')
        ->with('status_success', 'Insulina editada correctamente');
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
        $this->authorize('haveaccess', 'insulinas.delete');
        $insulina = Insulina::findOrFail($id);
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla insulinas',
            'id_usuario' => Auth()->user()->id
        ]);
        $insulina->delete();
        return redirect()->route('insulinas.index')
        ->with('status_success', 'Insulina eliminada correctamente');
    }
}
