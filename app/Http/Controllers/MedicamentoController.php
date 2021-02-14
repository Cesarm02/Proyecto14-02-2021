<?php

namespace App\Http\Controllers;

use Datatables;
use App\Modelos\Medicamento;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use App\Modelos\InformacionUser;
use Illuminate\Support\Facades\Auth;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess', 'medicamentos.index');

        $usuario = Auth::user()->id;
        $medicamentos = Medicamento::where('informacion_user_id', $usuario)->get();
        // dd($medicamentos);
        
        return view('medicamentos.index',
        compact('medicamentos'));
        // return view('medicamentos.index', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('haveaccess', 'medicamentos.create');
        return view('medicamentos.create');
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
        $this->authorize('haveaccess', 'medicamentos.store');

        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'administracion'  => 'required',
            'estado' => 'required',
        ]);
        
        $medicamento = Medicamento::create([
            'informacion_user_id' => auth()->user()->id
        ] + $request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla medicamentos',
            'id_usuario' => Auth()->user()->id
        ]);
        
        return redirect()->route('medicamentos.index')
        ->with('status_success', 'Medicamento agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        //
        $this->authorize('haveaccess', 'medicamentos.store');
        return view('medicamentos.show', compact('medicamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        //
        $this->authorize('haveaccess', 'medicamentos.edit');
        return view('medicamentos.edit', compact('medicamento'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        //
        $this->authorize('haveaccess', 'medicamentos.update');
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'administracion'  => 'required',
            'estado' => 'required',
        ]);
       
        $medicamento->update($request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $medicamento['id'] . ' en la tabla medicamentos',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('medicamentos.index')
        ->with('status_success', 'Medicamento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        //
        $this->authorize('haveaccess', 'medicamentos.destroy');
        $medicamento->delete();

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $medicamento->id . ' en la tabla medicamentos',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('medicamentos.index')
        ->with('status_success', 'Medicamento actualizado correctamente');
    
    }
}
