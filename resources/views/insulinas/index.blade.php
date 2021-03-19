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
        <li class="breadcrumb-item active">Insulinas</a></li>
    </ol>
    </nav>
        <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Insulinas </strong> 
            @can('haveaccess', 'insulinas.create')
                <a class="btn btn-primary float-right" href="{{route('insulinas.create')}}">Agregar Insulina</a>
            @endcan
        </h3>
    </div>
@include('personalizar.mensaje')
<div class="table-responsive">
    <table id="insulinas" style="text-align:center"  class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>tipo</th>
                <th  ></th>
                <th ></th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
            @foreach($insulinas as $insulina)
            <tr>
                <td> {{$insulina->id}}</td>
                <td> {{$insulina->nombre}}</td>
                <td> {{$insulina->fecha}}</td>
                <td> {{$insulina->hora}}</td>
                <td> {{$insulina->tipo}} </td>
                <td > <a href="{{route('insulinas.show', $insulina->id)}}" class="btn btn-outline-info "> Ver </a></td>

                <td > <a href="{{route('insulinas.edit', $insulina->id)}}" class="btn btn-outline-success " > Editar </a></td>
                <td >
                    <form action="{{route('insulinas.destroy', $insulina->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el {{$insulina->id}}?')">Eliminar</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
<script>
    $(document).ready(function() {
        $('#insulinas').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
