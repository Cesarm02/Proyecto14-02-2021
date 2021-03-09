@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
        // document.addEventListener('DOMContentLoaded', function(){
            var pesos = [];
            var alturas = [];
            var imcs = [];
            var fechas = [];
            var ids = [];
        $(document).ready(function(){

            $.ajax({
                url: '/graficas',
                method: 'POST',
                data:$("form").serialize()
            }).done(function(res){
                var arreglo = JSON.parse(res);
                // console.log(arreglo.sort(((a, b) => a.id - b.id)));
                arreglo.sort(((a, b) => a.id - b.id))
                for(var x = 0; x <arreglo.length; x++){
                    pesos.push(arreglo[x].peso);
                    alturas.push(arreglo[x].altura);
                    imcs.push(arreglo[x].imc);
                    fechas.push(arreglo[x].fecha);
                    ids.push(arreglo[x].id);
                }
                generarGrafica();
            });
            
            
        });

        function generarGrafica(){
            var ctx = document.getElementById('peso').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Peso',
                        data: pesos,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Altura',
                        data: alturas,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 0.2)',
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
                            'rgba(153, 102, 255, 0.2)',
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
            <li class="breadcrumb-item active" aria-current="page">Peso</li>
        </ol>
    </nav>

    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de graficas de <strong> Peso y Altura</strong> 
            <a href="/graficaPeso/imprimir" class="float-right btn btn-primary shadow-sm">
                <i class="fas fa-print fa-sm text-white-50">
                    Imprimir
                </i>
            </a>
        </h3>
    </div>

@include('personalizar.mensaje')

    <section class="container">
        <div class="form-row">
            <div class="form-group col-md-6 " style="width: 100px  height:100px;
     margin: 0px auto;" >
                <canvas id="peso" width="500" height="500" ></canvas>
    
                <form action="/graficaPeso" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="id" value ="1">
                </form>
            </div>
    


        </div>


    </section>


@endsection