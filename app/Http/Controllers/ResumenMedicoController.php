<?php

namespace App\Http\Controllers;

use App\User;
use App\Modelos\Insulina;
use App\Modelos\ResumenCeg;
use App\Modelos\Medicamento;
use Illuminate\Http\Request;
use App\Modelos\PesoPaciente;
use App\Modelos\AntecedentesPersonale;

class ResumenMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($id);
        $usuario = $user->id;
        $pesos = PesoPaciente::where('informacion_user_id', $usuario)->orderBY('created_at', 'Desc')->take(4)->get();
        $medicamentos = Medicamento::where('informacion_user_id', $usuario)->get();
        $glucometrias = ResumenCeg::where('informacion_user_id', $usuario)->where('categoria', 'glucometria')->orderBY('created_at', 'Desc')->get();
        $insulinas = Insulina::where('informacion_user_id', $usuario)->get();

        $personales = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'antecedentes_personales')->get();
        $familiares = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'antecedentes_familiares')->get();
        $alergias = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'alergias')->get();
        $vacunas = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'vacunas')->get();
        $tratamientos = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'tratamientos')->get();
        $intervenciones = AntecedentesPersonale::where('informacion_user_id', $usuario)->where('tipo', 'intervenciones_quirúrgicas')->get();
        
        return view('user.resumen', compact('pesos', 'medicamentos', 'glucometrias', 'insulinas', 'personales', 'familiares', 'alergias', 'vacunas', 'tratamientos','intervenciones', 'user'));

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
