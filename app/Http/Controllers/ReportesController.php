<?php

namespace App\Http\Controllers;

use App\Modelos\ResumenCeg;
use Illuminate\Http\Request;
use App\Modelos\PesoPaciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
        return view('reportes.fechas');
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
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'categoria'  => 'required',
        ]);

        if($request['fecha_inicio'] > $request['fecha_final']){
            return redirect()->route('reportes.create')
                ->with('falla', 'La fecha de inicio no puede ser menor a la fecha final');
        }else{
            if($request['categoria'] == 'peso'){
                $pesos = PesoPaciente::where('informacion_user_id', (Auth::user()->id))->orderBY('id', 'DESC')->whereBetween('fecha', [$request['fecha_inicio'], $request['fecha_final']])->get();
                // return response(json_encode($pesos), 200)->header('Content-type', 'text/plain');
                $datos = json_encode($pesos);
                // dd($datos);
                // return view('reportes.graficaFecha', response(json_encode($pesos)));
                return Response::view('reportes.graficaFecha', compact('datos'));

            } else if ($request['categoria'] == 'ejercicio') {
                $ejercicios = ResumenCeg::where('informacion_user_id', (Auth::user()->id))->where('categoria', 'ejercicio')->whereBetween('fecha', [$request['fecha_inicio'], $request['fecha_final']])->get();
                // return response(json_encode($ejercicios), 200)->header('Content-type', 'text/plain');
                $datos = json_encode($ejercicios);
                return Response::view('reportes.graficaFecha', compact('datos'));

            } else if ($request['categoria'] == 'glucometria') {
                $glucometrias = ResumenCeg::where('informacion_user_id', (Auth::user()->id))->where('categoria', 'glucometria')->whereBetween('fecha', [$request['fecha_inicio'], $request['fecha_final']])->get();
                // return response(json_encode($glucometrias), 200)->header('Content-type', 'text/plain');
                $datos = json_encode($glucometrias);
                return Response::view('reportes.graficaFecha', compact('datos'));
            }
        }
    }

    public function fecha()
    {
        return view('reportes.graficaFecha');
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
