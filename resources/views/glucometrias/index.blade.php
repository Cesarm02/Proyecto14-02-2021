@extends('layouts.app')
   <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active">Glucometrias</a></li>
    </ol>
    </nav>
        <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Glucometrias </strong> 
            @can('haveaccess', 'glucometrias.create')
                <a class="btn btn-primary float-right" href="{{route('glucometrias.create')}}">Agregar glucometrías</a>
            @endcan
        </h3>
    </div>
@include('personalizar.mensaje')
<div class="table-responsive">
    <table id="glucometrias" style="text-align:center"  class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Comida</th>
                <th>Valor de glucosa</th>
                <th ></th>
                <th ></th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
            @foreach($glucometrias as $glucometria)
            <tr>
                <td> {{$glucometria->fecha}}</td>
                <td> {{$glucometria->hora}}</td>
                <td> {{$glucometria->tipo_hora}} {{$glucometria->tipo}}</td>
                @if($glucometria->tipo_hora == "antes" && $glucometria->valor_glucometria >=100 && $glucometria->valor_glucometria <=120)
                    <td style='background-color:RGB(72,201,176)' > {{$glucometria->valor_glucometria}}</td>
                @elseif($glucometria->tipo_hora == "antes" && ($glucometria->valor_glucometria >=90 && $glucometria->valor_glucometria <=99) || ($glucometria->valor_glucometria >=121 && $glucometria->valor_glucometria <=130))
                    <td style='background-color:RGB(255,128,0)' > {{$glucometria->valor_glucometria}}</td>
                @elseif($glucometria->tipo_hora == "antes" && ( $glucometria->valor_glucometria <=89 || $glucometria->valor_glucometria >=131 ))
                    <td style='background-color:RED' > {{$glucometria->valor_glucometria}}</td>
                @elseif($glucometria->tipo_hora == "despues" && $glucometria->valor_glucometria == 180)
                    <td style='background-color:RGB(72,201,176)' > {{$glucometria->valor_glucometria}}</td>
                @elseif($glucometria->tipo_hora == "despues" && ($glucometria->valor_glucometria >=170 && $glucometria->valor_glucometria <=179) || ($glucometria->valor_glucometria >=181 && $glucometria->valor_glucometria <=190))
                    <td style='background-color:RGB(255,128,0)' > {{$glucometria->valor_glucometria}}</td>
                @elseif($glucometria->tipo_hora == "despues" && ( $glucometria->valor_glucometria <=169 || $glucometria->valor_glucometria >=191 ))
                    <td style='background-color:RED' > {{$glucometria->valor_glucometria}}</td>
                @endif
                <td > <a href="{{route('glucometrias.show', $glucometria->id)}}" class="btn btn-outline-info "> Ver </a></td>
                <td > <a href="{{route('glucometrias.edit', $glucometria->id)}}" class="btn btn-outline-success " > Editar </a></td>
                <td >
                    <form action="{{route('glucometrias.destroy', $glucometria->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el {{$glucometria->id}}?')">Eliminar</button>
                        </form>
                    <a href=""> </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<script>
    $(document).ready(function(){
        $('#glucometrias').DataTable();
    });
</script>