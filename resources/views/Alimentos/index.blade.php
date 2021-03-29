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
        <li class="breadcrumb-item active">Alimentos</a></li>
    </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Alimentos </strong> 
            @can('haveaccess', 'alimentos.create')
                <a class="btn btn-primary float-right" href="{{route('alimentos.create')}}">Agregar Alimentos</a>
            @endcan
        </h3>
    </div>

    @include('personalizar.mensaje')
    <div class="table-responsive">
        <table id="alimentos" style="text-align:center"  class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Comida</th>
                        <th>Descripción</th>
                        <th ></th>
                        <th ></th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alimentos as $alimento)
                    <tr>
                        <td> {{$alimento->fecha}}</td>
                        <td> {{$alimento->hora}}</td>
                        <td> {{$alimento->tipo}}</td>
                        <td> {{$alimento->descripcion}}</td>
                        <td > <a href="{{route('alimentos.show', $alimento->id)}}" class="btn btn-outline-info "> Ver </a></td>
                        <td > <a href="{{route('alimentos.edit', $alimento->id)}}" class="btn btn-outline-success " > Editar </a></td>
                        <td >
                            <form action="{{route('alimentos.destroy', $alimento->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el {{$alimento->id}}?')">Eliminar</button>
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
        $('#alimentos').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });

</script>