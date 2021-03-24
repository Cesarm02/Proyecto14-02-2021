@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    
<script>
        // document.addEventListener('DOMContentLoaded', function(){
            var valor_glucometria = [];
            var pesos = [];
            var alturas = [];
            var imcs = [];
            var fechas = [];
            var tiempo = [];
            var pesos = [];
            var ids = [];
        $(document).ready(function(){
            // const arreglo = {!! json_encode($datos) !!};
            var arreglo = JSON.parse({!! json_encode($datos) !!});
            console.log(arreglo);
            arreglo.sort(((a, b) => a.id - b.id));
            for(var x = 0; x <arreglo.length; x++){
                if(arreglo[x].peso){
                    pesos.push(arreglo[x].peso);    
                    alturas.push(arreglo[x].altura);
                    imcs.push(arreglo[x].imc);
                    console.log(x);
                }else if(arreglo[x].tiempo_ejercicio>0){
                    tiempo.push(arreglo[x].tiempo_ejercicio);

                }else if(arreglo[x].valor_glucometria>0){
                    valor_glucometria.push(arreglo[x].valor_glucometria);
                    tiempo.push(arreglo[x].valor_glucometria)
                }
                fechas.push(arreglo[x].fecha);
                ids.push(arreglo[x].id);
            }
            if(arreglo[0].peso>0){
                generarGrafica();            
            }else if(arreglo[0].tiempo_ejercicio>0){
                Ejercicio();
            }else if(arreglo[0].valor_glucometria>0){
                glucometria();
            }

        });

        function generarGrafica(){
            var ctx = document.getElementById('datos').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Peso',
                        data: pesos,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Altura',
                        data: alturas,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Indice',
                        data: imcs,
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)',
                            
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 0.2)'
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

        function Ejercicio(){
            var ctx = document.getElementById('datos').getContext('2d');

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

        function glucometria(){
            var ctx = document.getElementById('datos').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'glucosa',
                        data: valor_glucometria,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
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
            <li class="breadcrumb-item active" ><a href="{{route('reportes.index')}}">Reportes</a></li>
            <li class="breadcrumb-item active" > <a href="{{route('reportes.create')}}">Formulario</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grafica por fecha</li>

        </ol>
    </nav>

    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Reportes </strong> 
            
        </h3>
    </div>

@include('personalizar.mensaje')

    <section class="container">
        <div class="form-row">
            <div class="form-group col-md-6 " style="width: 100px  height:100px ;
             margin: 0px auto; border:1px solid #000000;" >
                <canvas id="datos" width="500" height="500" ></canvas>
            </div>
        </div>
    </section>

@endsection