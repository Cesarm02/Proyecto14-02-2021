<?php

namespace App\Http\Controllers;

use App\Modelos\ResumenCeg;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Auth;

class AlimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'alimentos.index');
        $usuario = Auth::user()->id;
        $alimentos =ResumenCeg::where('informacion_user_id', $usuario)->where('categoria', 'comida')->get();
        return view('alimentos.index', compact('alimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('haveaccess', 'alimentos.create');
        return view('alimentos.create');
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
        $this->authorize('haveaccess', 'alimentos.store');
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required'
        ]);

        $alimentos = ResumenCeg::create([
            'informacion_user_id' => auth()->user()->id,
            'categoria' => 'comida'
        ] + $request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla resumen_cegs[Alimentos]',
            'id_usuario' => Auth()->user()->id
        ]);
        return redirect()->route('alimentos.index')
        ->with('status_success', 'Alimento agregado correctamente');
   

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
        $this->authorize('haveaccess', 'alimentos.show');
        $alimento = ResumenCeg::findOrFail($id);
        return view('alimentos.show', compact('alimento'));
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
        $this->authorize('haveaccess', 'alimentos.edit');
        $alimento = ResumenCeg::findOrFail($id);
        return view('alimentos.edit', compact('alimento'));
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
        $this->authorize('haveaccess', 'alimentos.update');
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required'
        ]);

        $alimento = ResumenCeg::findOrFail($id);
        $alimento->update($request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $alimento['id'] . ' en la tabla resumen_cegs[Alimento]',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('alimentos.index')
        ->with('status_success', 'Alimento actualizado correctamente');
 
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
        $this->authorize('haveaccess', 'alimentos.destroy');
        $alimento = ResumenCeg::findOrFail($id);
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla resumen_Ceg[Alimento]',
            'id_usuario' => Auth()->user()->id
        ]);
        $alimento->delete();

        return redirect()->route('alimentos.index')
        ->with('status_success', 'Alimento eliminado correctamente');
 
    }
}
