<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\PesoPaciente;
use App\Modelos\ResumenCeg;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('haveaccess', 'reportes.index');
        return view('reportes.index');
    }

    public function peso()
    {
        $pesos = PesoPaciente::where('informacion_user_id', (Auth::user()->id))->orderBY('id', 'DESC')->latest()->take(5)->get();
        return response(json_encode($pesos), 200)->header('Content-type', 'text/plain');
    }

    public function graficaPeso()
    {
        return view('reportes.peso');
    }

    public function ejercicio()
    {
        $ejercicios = ResumenCeg::where('informacion_user_id', (Auth::user()->id))->where('categoria', 'ejercicio')->orderBy('id', 'DESC')->latest()->take(7)->get();
        return response(json_encode($ejercicios), 200)->header('Content-type', 'text/plain');
    }

    public function graficaEjercicio()
    {
        return view('reportes.ejercicio');
    }

    public function glucometria()
    {
        $glucometrias = ResumenCeg::where('informacion_user_id', (Auth::user()->id))->where('categoria', 'glucometria')->orderBy('id', 'DESC')->latest()->take(7)->get();
        return response(json_encode($glucometrias), 200)->header('Content-type', 'text/plain');
    }

    public function graficaGlucometria()
    {
        return view('reportes.glucometria');
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
