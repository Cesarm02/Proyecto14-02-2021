<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Auth;
use App\Modelos\AntecedentesPersonale;

class AntescedentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'antecedentes.index');
        $usuario = Auth::user()->id;
        $personales = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'antecedentes_personales')->get();
        $familiares = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'antecedentes_familiares')->get();
        $alergias = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'alergias')->get();
        $vacunas = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'vacunas')->get();
        $tratamientos = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'tratamientos')->get();
        $intervenciones = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'intervenciones_quirúrgicas')->get();
        
        // dd($personal);
        return view('antecedentes.index', compact('personales', 'familiares', 'alergias', 'vacunas', 'tratamientos', 'intervenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('haveaccess', 'antecedentes.index');
        return view('antecedentes.create');
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
        $this->authorize('haveaccess', 'antecedentes.create');

        $request->validate([
            'tipo' => 'required',
            'fecha_diagnostico' => 'required',
            'nombre' => 'required',
        ]);
        $antecedente = AntecedentesPersonale::create([
            'informacion_user_id' => auth()->user()->id,
        ] + $request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla antecedentes_personales',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('antecedentes.index')
        ->with('status_success', 'Antecedente registrado correctamente');
   
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
        $this->authorize('haveaccess', 'antecedentes.edit');
        $antecedente = AntecedentesPersonale::findOrFail($id);
        return view('antecedentes.edit', compact('antecedente'));
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
        $this->authorize('haveaccess', 'antecedentes.edit');

        $request->validate([
            'tipo' => 'required',
            'fecha_diagnostico' => 'required',
            'nombre' => 'required',
        ]);

        $antecedente = AntecedentesPersonale::findOrFail($id);
        $antecedente->update($request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $antecedente['id'] . ' en la tabla antecedentes_personales',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('antecedentes.index')
        ->with('status_success', 'Antecedente editado correctamente');
   
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
        $this->authorize('haveaccess', 'antecedentes.store');
        $antecedente = AntecedentesPersonale::findOrFail($id);
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla antecedente_personales',
            'id_usuario' => Auth()->user()->id
        ]);
        $antecedente->delete();
        return redirect()->route('antecedentes.index')
        ->with('status_success', 'antecedente eliminada correctamente');
 

    }
}
