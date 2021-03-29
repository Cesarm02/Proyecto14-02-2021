<?php

namespace App\Http\Controllers;

use App\Modelos\ResumenCeg;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use Illuminate\Support\Facades\Auth;

class GlucometriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'glucometrias.index');
        $usuario = Auth::user()->id;
        $glucometrias = ResumenCeg::where('informacion_user_id', $usuario)->where('categoria', 'glucometria')->get();
        // dd($glucometria);
        if ($glucometrias == null) {
            $glucometrias = null;
        }
        return view(
            'glucometrias.index',
            compact('glucometrias')
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('haveaccess', 'glucometrias.create');
        return view('glucometrias.create');
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
        $this->authorize('haveaccess', 'glucometrias.create');
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'valor_glucometria'  => 'required',
            'tipo' => 'required',
            'tipo_hora' => 'required',
        ]);

        $glucometria = ResumenCeg::create([
            'informacion_user_id' => auth()->user()->id,
            'categoria' => 'glucometria'
        ] + $request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla resumen_cegs[Glucometrias]',
            'id_usuario' => Auth()->user()->id
        ]);
        return redirect()->route('glucometrias.index')
        ->with('status_success', 'Glucometría agregada correctamente');
   
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
        $this->authorize('haveaccess', 'glucometrias.show');
        $glucometria = ResumenCeg::findOrFail($id);
        return view('glucometrias.show', compact('glucometria'));

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
        $this->authorize('haveaccess', 'glucometrias.edit');
        $glucometria = ResumenCeg::findOrFail($id);
        return view('glucometrias.edit', compact('glucometria'));

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
        $this->authorize('haveaccess', 'glucometrias.edit');
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'valor_glucometria'  => 'required',
            'tipo' => 'required',
            'tipo_hora' => 'required',
        ]);

        $glucometria = ResumenCeg::findOrFail($id);
        $glucometria->update($request->all());

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $glucometria['id'] . ' en la tabla resumen_cegs[Glucometria]',
            'id_usuario' => Auth()->user()->id
        ]);

        return redirect()->route('glucometrias.index')
        ->with('status_success', 'Glucometría actualizada correctamente');
 
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
        $this->authorize('haveaccess', 'glucometrias.destroy');
        $glucometria = ResumenCeg::findOrFail($id);
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla resumen_Ceg[Glucometria]',
            'id_usuario' => Auth()->user()->id
        ]);
        $glucometria->delete();


        return redirect()->route('glucometrias.index')
        ->with('status_success', 'Glucometría eliminada correctamente');
 
    }
}
