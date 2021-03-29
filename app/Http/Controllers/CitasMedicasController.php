<?php

namespace App\Http\Controllers;

use App\Modelos\CitasMedica;
use App\Modelos\ControlCambios;
use Illuminate\Http\Request;

class CitasMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'citas.index');

        return view('eventos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->authorize('haveaccess', 'citas.create');
        
        $datosEvento = request()->except(['_token', '_method']);
        
        CitasMedica::insert($datosEvento);  
        
        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se crea registro  en la tabla citas',
            'id_usuario' => Auth()->user()->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $this->authorize('haveaccess', 'citas.show');
        $data['eventos'] = CitasMedica::where('informacion_user_id', (Auth()->user()->id))->get();
        return response()->json($data['eventos']);
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
        $this->authorize('haveaccess', 'citas.edit');
        $datosEvento = request()->except(['_token', '_method']);
        $respuesta = CitasMedica::where('id','=',$id)->update($datosEvento);

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $request->get('id') . 'en la tabla citas',
            'id_usuario' => Auth()->user()->id
        ]);

        return response()->json($respuesta);
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
        $this->authorize('haveaccess', 'citas.destroy');
        $eventos = CitasMedica::findOrFail($id);
        CitasMedica::destroy($id);

        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se elimina registro ' . $id . ' en la tabla citas',
            'id_usuario' => Auth()->user()->id
        ]);

        return response()->json($id);
    }
}
