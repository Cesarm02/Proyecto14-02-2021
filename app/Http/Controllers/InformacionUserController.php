<?php

namespace App\Http\Controllers;

use App\Modelos\Insulina;
use App\Modelos\Acudiente;
use App\Modelos\Medicamento;
use Illuminate\Http\Request;
use App\Modelos\PesoPaciente;
use App\Modelos\InformacionUser;
use Illuminate\Support\Facades\Auth;
use App\Modelos\AntecedentesPersonale;

class InformacionUserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $perfil =  InformacionUser::find($id);
        
        if ($perfil == null) {
            return response()->view("errors.404", [], 404);
        }
        $acudiente = Acudiente::with('informacion_user_id')->get();

        $antecedentes = AntecedentesPersonale::with('informacion_user_id')->get();

        $medicamentos = Medicamento::where('informacion_user_id', Auth::user()->id)->paginate(4);

        $insulinas = Insulina::with('informacion_user_id')->get();

        $peso = PesoPaciente::with('informacion_user_id')->orderBy('id','DESC')->latest();

        // dd($acudiente);

        return view('perfiles.show', compact('perfil', 'acudiente', 'antecedentes', 'medicamentos', 'insulinas', 'peso'));

    }

}
