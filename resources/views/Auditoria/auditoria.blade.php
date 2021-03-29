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
        <li class="breadcrumb-item active">Auditoria</a></li>
    </ol>
    </nav>
        <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Cambios </strong> </h3>
    </div>
    @can('haveaccess', 'auditoria')

        @include('personalizar.mensaje')
        <div class="table-responsive">
            <table id="datos" style="text-align:center"  class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Id usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                        <tr>
                            <td>{{$dato->id}}</td>
                            <td>{{$dato->fecha_hora}}</td>
                            <td>{{$dato->descripcion}}</td>
                            <td>{{$dato->id_usuario}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        @endcan
        @endsection
        <script>
            $(document).ready(function() {
                $('#datos').DataTable({
                    "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                     "order": [[ 1, "desc" ]]
                });
            });
        </script>
