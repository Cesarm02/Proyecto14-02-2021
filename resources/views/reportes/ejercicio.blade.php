@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
        // document.addEventListener('DOMContentLoaded', function(){
            var fechas = [];
            var tiempo = [];
            var pesos = [];
            var ids = [];
        $(document).ready(function(){

            $.ajax({
                url: '/grafica_ejercicio',
                method: 'POST',
                data:$("form").serialize()
            }).done(function(res){
                var arreglo = JSON.parse(res);
                console.log(res);
                // console.log(arreglo.sort(((a, b) => a.id - b.id)));
                arreglo.sort(((a, b) => a.id - b.id))
                for(var x = 0; x <arreglo.length; x++){
                    tiempo.push(arreglo[x].tiempo_ejercicio)
                    fechas.push(arreglo[x].fecha);
                    ids.push(arreglo[x].id);
                }
                console.log(arreglo);
                generarGrafica();
            });
            
            
        });

        function generarGrafica(){
            var ctx = document.getElementById('altura').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Tiempo ejercicio en minutos',
                        data: tiempo,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',

                        ],
                        borderWidth: 1
                    }
                    ]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

</script>


@endsection

@section('content')

<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('reportes.index')}}">Reportes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ejercicio</li>
        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de graficas de <strong> Ejercicios</strong> 
        </h3>
    </div>

@include('personalizar.mensaje')

    <section class="container">
        <div class="form-row">
            <div class="form-group col-md-6 " style="width: 100px  height:100px;
             margin: 0px auto;" >
                <canvas id="altura" width="500" height="500" ></canvas>
                <form action="/graficaEjercicio" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="id" value ="1">
                </form>
            </div>
        </div>
    </section>

@endsection