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
        <li class="breadcrumb-item active">Ejercicios</a></li>
    </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Ejercicios </strong> 
            @can('haveaccess', 'ejercicio.create')
                <a class="btn btn-primary float-right" href="{{route('ejercicio.create')}}">Agregar Ejercicio</a>
            @endcan
        </h3>
    </div>

    @include('personalizar.mensaje')
     <div class="table-responsive">
        <table id="ejercicio" style="text-align:center"  class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tiempo ejercicio</th>
                        <th>Tipo de ejercicio</th>
                        <th ></th>
                        <th ></th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ejercicio as $dato)
                    <tr>
                        <td> {{$dato->fecha}}</td>
                        <td> {{$dato->hora}}</td>
                        <td> {{$dato->tiempo_ejercicio}} Minutos</td>
                        <td> {{$dato->tipo_ejercicio}}</td>
                        <td > <a href="{{route('ejercicio.show', $dato->id)}}" class="btn btn-outline-info "> Ver </a></td>
                        <td > <a href="{{route('ejercicio.edit', $dato->id)}}" class="btn btn-outline-success " > Editar </a></td>
                        <td >
                            <form action="{{route('ejercicio.destroy', $dato->id)}}" method="POST">
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


@endsection
<script>
    $(document).ready(function() {
        $('#ejercicio').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>