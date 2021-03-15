<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use Illuminate\Http\Request;
use App\Modelos\ControlCambios;
use App\Modelos\InformacionUser;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $perfil = InformacionUser::where('id', Auth::user()->id)->get();
        return view("perfil.index", compact('perfil'));
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
        $perfil = InformacionUser::findOrFail($id);
        $user = User::findOrFail($id);
        $user->update($request->all());

        $fecha = new DateTime($request['fecha_nacimiento']);
        $año = new DateTime(date("Y-m-d"));
        $edad = (int) $fecha->diff($año)->format("%y");
        // dd($request->all());
        // dd($request['edad']);
        $perfil->update( ['edad' => $edad ] + $request->all());


        ControlCambios::create([
            'fecha_hora' => date('Y/m/d H:i:s', time()),
            'descripcion' => 'Se edita registro ' . $perfil['id'] . ' en la tabla informacion_users',
            'id_usuario' => Auth()->user()->id
        ]);
        return redirect()->route('perfil.index')
        ->with('status_success', 'perfil actualizado correctamente');

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
    }
}
