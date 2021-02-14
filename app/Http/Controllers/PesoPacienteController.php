<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\PesoPaciente;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Auth;

class PesoPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'pesos.index');

        $peso = PesoPaciente::where('informacion_user_id', (Auth::user()->id))->orderBY('created_at', 'Desc')->paginate(5);
        return view('peso.index',
        compact('peso'));
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
        $this->authorize('haveaccess', 'pesos.store');

        $request->validate([
            'peso' => 'required',
            'altura' => 'required',
        ]);

        $indice = $request->peso / (($request->altura/100) * ($request->altura/100));

        if($indice<18.5)
        {
            $comentario = "Por debajo del peso";
        }else if($indice >= 18.5 && $indice <= 24.9)
        {
            $comentario = "Saludable";
        }else if($indice >= 25 && $indice <= 29.9)
        {
            $comentario = "Con sobrepeso";
        }else if($indice >= 30 && $indice <= 39.9)
        {
            $comentario = "Obeso";
        }else
        {
            $comentario = "Obesidad mórbida";
        }

        $datos = PesoPaciente::create([
            'fecha' => date('Y/m/d H:i:s', time()),
            'imc' => $indice,
            'informacion_user_id' => auth()->user()->id,
            'comentario' => $comentario,
        ] + $request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla Peso',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('peso.index')
        ->with('status_success', 'Peso agregado correctamente');
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
        $this->authorize('haveaccess', 'pesos.destroy');
     
        $dato = PesoPaciente::where('id', $id)->get();
        $dato[0]->delete();
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla peso',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('peso.index')
        ->with('status_success', 'Peso eliminado correctamente');
    }
}
