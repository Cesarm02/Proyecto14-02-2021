<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('antecedentes.index', compact('personales', 'familiares', 'alergias'));
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
