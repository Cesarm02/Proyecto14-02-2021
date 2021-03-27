@extends('layouts.app')

@section('scripts')
    <link rel="stylesheet" href="{{asset("css/peso.css")}}">
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var peso = document.getElementById('sliderPeso');
            var inputPeso = document.getElementById('inputPeso');

            var altura = document.getElementById('sliderAltura');
            var inputAltura = document.getElementById('inputAltura');

            function mostrar(valor)
            {
                peso.value = valor;
            }

            function actualizar(e)
            {
                inputPeso.value = e.srcElement.value;
            }

            peso.addEventListener("input", actualizar);

            function altura(valor)
            {
                altura.value = valor;
            }
        
            function actuAltura(e)
            {
                inputAltura.value = e.srcElement.value;
            }

            altura.addEventListener("input", actuAltura);


        });
    </script>
@endsection

@section('content')
<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active">Perfil</li>
            <li class="breadcrumb-item active" aria-current="page">Peso y Altura</li>

        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Peso y Altura </strong> 
        </h3>
    </div>

@include('personalizar.mensaje')
<div class="table-responsive">
    <table  style="text-align:center"  class="table  table-striped table-bordered ">
        <thead>
            <th> Fecha</th>
            <th> Peso</th>
            <th> Altura</th>
            <th> IMC </th>
            <th> Comentario</th>
            <th> Acciones</th>

        </thead>
        <tbody>
            @foreach($peso as $dato)
            <tr>
                <td> {{$dato->fecha}}</td>
                <td> {{$dato->peso}}</td>
                <td> {{$dato->altura}}</td>
                <td> {{$dato->imc}}</td>
                <td> {{$dato->comentario}}</td>
                <td >
                    <form action="{{route('peso.destroy', $dato->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el {{$dato->id}}?')">Eliminar</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
    {{$peso->links()}}
</div>
    <section class="container">
        <div id="agregar">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Agregar peso y altura') }}</div>
                    <form 
                        action="{{route('peso.store')}}" 
                        method="POST"
                    >
                        <div class=" card-body form-row" style="text-align: center; width: 100%;">
                            <div class="form-group col-md-8 bmi-calculator-weight"  id="test">
                                <input
                                    id="sliderPeso"
                                    class="weight-slider"
                                    type="range"
                                    min="15"
                                    max="180"
                                    value="60"
                                />
                                <p>Peso:
                                <input
                                    id="inputPeso"
                                    class="inputNumber"
                                    name="peso"
                                    type="number"
                                    value="60"
                                    min="15"
                                    max="180"
                                    oninput="showValueWeight(this.value)"
                                    readonly
                                />
                                <span>Kg</span>
                                </p>
                            </div>
                            <div class=" form-group col-md-8 bmi-calculator-height"  id="test">
                                <input
                                    id="sliderAltura"
                                    class="height-slider"
                                    type="range"
                                    min="25"
                                    max="220"
                                    value="60"
                                />
                                <p>Altura:
                                    <input
                                        id="inputAltura"
                                        name="altura"
                                        class="inputNumber"
                                        type="number"
                                        value="60"
                                        min="25"
                                        max="220"
                                        name="altura"
                                        readonly
                                    />
                                    <span>cm</span>
                                    </p>
                                </div>
                                <div class="form-group col-md-8" id="test">
                                    <br>
                                    <br>
                                    @csrf
                                    <input class="button" type="submit" value="Agregar">
                                </div>
                            </div>
                        </div>
                    @csrf
                    </form>
            </div>
        </div>
    </div>
    </section>

    </section>

@endsection
