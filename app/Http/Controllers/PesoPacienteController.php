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
        $this->authorize('haveaccess', 'pesos.create');

        $request->validate([
            'peso' => 'required',
            'altura' => 'required',
        ]);

        $indice = $request->peso / (($request->altura/100) * ($request->altura/100));
        // dd(Auth::user()->informacion_user[0]->edad);

        if(Auth::user()->informacion_user[0]->edad!= null && Auth::user()->informacion_user[0]->sexo != null){
            if (Auth::user()->informacion_user[0]->edad > 20) {
                if ($indice < 18.5) {
                    $comentario = "Por debajo del peso";
                } else if ($indice >= 18.5 && $indice <= 24.9) {
                    $comentario = "Saludable";
                } else if ($indice >= 25 && $indice <= 29.9) {
                    $comentario = "Con sobrepeso";
                } else if ($indice >= 30 && $indice <= 39.9) {
                    $comentario = "Obeso";
                } else {
                    $comentario = "Obesidad mórbida";
                }
            } else if(Auth::user()->informacion_user[0]->edad <= 20){
                if(Auth::user()->informacion_user[0]->sexo == "F"){
                    if(Auth::user()->informacion_user[0]->edad== 2){
                        if($indice <=14.5){
                            $comentario = "Niña en situación de bajo peso.";
                        }else if($indice > 14.5 && $indice <=18){
                            $comentario = "Niña con peso normal.";
                        }else if($indice >18 && $indice <=19){
                            $comentario = "Niña con sobrepeso.";
                        }else {
                            $comentario = "Niña con obesidad.";
                        }

                    } else if (Auth::user()->informacion_user[0]->edad == 3) {
                        if ($indice <= 14) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 14 && $indice <= 17.2) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 17.2 && $indice <= 18.4) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 4) {
                        if ($indice <= 13.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 13.8 && $indice <= 16.8) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 16.8 && $indice <= 18) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 5) {
                        if ($indice <= 13.5) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 13.5 && $indice <= 16.8) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 16.8 && $indice <= 18.2) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 6) {
                        if ($indice <= 13.4) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 13.4 && $indice <= 17.2) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 17.2 && $indice <= 18.8) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 7) {
                        if ($indice <= 13.5) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 13.5 && $indice <= 17.8) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 1.8 && $indice <= 19.5) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 8) {
                        if ($indice <= 13.6) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 13.6 && $indice <= 18.4) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 18.4 && $indice <= 20.6) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 9) {
                        if ($indice <= 13.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 13.8 && $indice <= 19.2) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 19.2 && $indice <= 21.8) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 10) {
                        if ($indice <= 14) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 14 && $indice <= 20) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 20 && $indice <= 23) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 11) {
                        if ($indice <= 14.5) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 14.5 && $indice <= 19.8) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 19.8 && $indice <= 24) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 12) {
                        if ($indice <= 14.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 14.8 && $indice <= 21.6) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 21.6 && $indice <= 25.2) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 13) {
                        if ($indice <= 15.2) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 15.2 && $indice <= 22.5) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 22.5 && $indice <= 26.2) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 14) {
                        if ($indice <= 15.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 15.8 && $indice <= 23.2) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 23.2 && $indice <= 27.2) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 15) {
                        if ($indice <= 16.2) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 16.2 && $indice <= 24) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 24 && $indice <= 28.2) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 16) {
                        if ($indice <= 16.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 16.8 && $indice <= 24.6) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 24.6 && $indice <= 28.8) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 17) {
                        if ($indice <= 17.2) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 17.2 && $indice <= 25.2) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 25.2 && $indice <= 28.8) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 18) {
                        if ($indice <= 17.5) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 17.5 && $indice <= 25.6) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 25.6 && $indice <= 30.4) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 19) {
                        if ($indice <= 17.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 17.8 && $indice <= 26) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 26 && $indice <= 31) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 20) {
                        if ($indice <= 17.8) {
                            $comentario = "Niña en situación de bajo peso.";
                        } else if ($indice > 17.8 && $indice <= 26.5) {
                            $comentario = "Niña con peso normal.";
                        } else if ($indice > 26.5 && $indice <= 31.6) {
                            $comentario = "Niña con sobrepeso.";
                        } else {
                            $comentario = "Niña con obesidad.";
                        }
                    }

                }else{
                    if (Auth::user()->informacion_user[0]->edad == 2) {
                        if ($indice <= 14.5) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 14.5 && $indice <= 18.2) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 18.2 && $indice <= 19.8) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 3) {
                        if ($indice <= 14.2) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 14.2 && $indice <= 17.2) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 17.2 && $indice <= 18.6) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 4) {
                        if ($indice <= 13.8) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 13.8 && $indice <= 17) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 17 && $indice <= 18.2) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 5) {
                        if ($indice <= 13.6) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 13.6 && $indice <= 16.8) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 16.8 && $indice <= 18.4) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 6) {
                        if ($indice <= 13.5) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 13.5 && $indice <= 17) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 17 && $indice <= 19) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 7) {
                        if ($indice <= 13.5) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 13.5 && $indice <= 17.4) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 17.4 && $indice <= 20) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 8) {
                        if ($indice <= 13.6) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 13.6 && $indice <= 18) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 18 && $indice <= 21.2) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 9) {
                        if ($indice <= 13.7) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 13.7 && $indice <= 18.6) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 18.6 && $indice <= 22.4) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 10) {
                        if ($indice <= 14) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 14 && $indice <= 19.4) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 19.4 && $indice <= 23.5) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 11) {
                        if ($indice <= 14.2) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 14.2 && $indice <= 20.2) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 20.2 && $indice <= 24.8) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 12) {
                        if ($indice <= 14.5) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 14.5 && $indice <= 20.5) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 20.5 && $indice <= 25.4) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 13) {
                        if ($indice <= 15.2) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 15.2 && $indice <= 21.8) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 21.8 && $indice <= 27) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 14) {
                        if ($indice <= 15.6) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 15.6 && $indice <= 22.6) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 22.6 && $indice <= 27.8) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 15) {
                        if ($indice <= 16.2) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 16.2 && $indice <= 23.4) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 23.4 && $indice <= 28.6) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 16) {
                        if ($indice <= 16.6) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 16.6 && $indice <= 24.2) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 24.2 && $indice <= 29.3) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 17) {
                        if ($indice <= 17.3) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 17.3 && $indice <= 24.9) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 24.9 && $indice <= 29.9) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 18) {
                        if ($indice <= 17.8) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 17.8 && $indice <= 25.6) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 25.6 && $indice <= 30.6) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 19) {
                        if ($indice <= 18.3) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 18.3 && $indice <= 26.4) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 26.4 && $indice <= 31.4) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    } else if (Auth::user()->informacion_user[0]->edad == 20) {
                        if ($indice <= 18.6) {
                            $comentario = "Niño en situación de bajo peso.";
                        } else if ($indice > 18.6 && $indice <= 27) {
                            $comentario = "Niño con peso normal.";
                        } else if ($indice > 27 && $indice <= 34) {
                            $comentario = "Niño con sobrepeso.";
                        } else {
                            $comentario = "Niño con obesidad.";
                        }
                    }
                }
            }

            // dd($request->all());

            $datos = PesoPaciente::create([

                // 'fecha' => date('Y/m/d H:i:s', time()),
                // 'imc' => $indice,
                'informacion_user_id' => auth()->user()->id,
                // 'comentario' => $comentario,
                // 'peso' => $request->peso,
                // 'altura' => $request->altura
            ] + $request->all());

            // dd("Entro");
            

            ControlCambios::create([
                'fecha_hora' => date('Y/m/d H:i:s', time()),
                'descripcion' => 'Se crea registro ' . $request->get('id') . ' en la tabla Peso',
                'id_usuario' => Auth()->user()->id
            ]);
                // return view('Auditoria.tablas');

            return redirect()->route('peso.index')
                ->with('status_success', 'Peso agregado correctamente');
        }else{
            return redirect()->route('peso.index')
                ->with('falla', 'Debes agregar primero tu edad y sexo en la sección de datos personales');
        }

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
