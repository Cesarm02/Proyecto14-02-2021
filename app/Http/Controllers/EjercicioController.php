<?php

namespace App\Http\Controllers;

use App\Modelos\ResumenCeg;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'ejercicios.index');
        $usuario = Auth::user()->id;
        $ejercicio = ResumenCeg::where('informacion_user_id', $usuario)->where('categoria', 'ejercicio')->get();
        return view('ejercicios.index', compact('ejercicio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('haveaccess', 'ejercicios.create');
        return view('ejercicios.create');
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
        // $this->authorize('haveaccess', 'ejercicios.create');
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'tipo_ejercicio' => 'required',
        ]);
        $ejercicio = ResumenCeg::create([
            'informacion_user_id' => auth()->user()->id,
            'categoria' => 'ejercicio'
        ] + $request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla resumen_cegs[Ejercicio]',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('ejercicio.index')
        ->with('status_success', 'Ejercicio registrado correctamente');
   
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
        $this->authorize('haveaccess', 'ejercicios.show');
        $ejercicio = ResumenCeg::findOrFail($id);
        return view('ejercicios.show', compact('ejercicio'));
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
        $this->authorize('haveaccess', 'ejercicios.edit');
        $ejercicio = ResumenCeg::findOrFail($id);
        return view('ejercicios.edit', compact('ejercicio'));
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
        $this->authorize('haveaccess', 'ejercicios.edit');
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'tipo_ejercicio' => 'required',
            'descripcion' => 'required',
            'tiempo_ejercicio' => 'required',
        ]);

        $ejercicio = ResumenCeg::findOrFail($id);
        $ejercicio->update($request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $ejercicio['id'] . ' en la tabla resumen_cegs[Ejercicio]',
            'id_usuario' => Auth()->user()->id
        ]);
        return redirect()->route('ejercicio.index')
        ->with('status_success', 'Ejercicio actualizada correctamente');
 
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
        $this->authorize('haveaccess', 'ejercicio.destroy');
        $glucometria = ResumenCeg::findOrFail($id);
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla resumen_Ceg[Ejercicio]',
            'id_usuario' => Auth()->user()->id
        ]);
        $glucometria->delete();

        return redirect()->route('ejercicio.index')
        ->with('status_success', 'Ejercicio eliminada correctamente');
 
    }
}
