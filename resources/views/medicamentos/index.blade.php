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
        <li class="breadcrumb-item active">Medicamentos</a></li>
    </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> medicamentos </strong> 
            @can('haveaccess', 'medicamentos.create')
                <a class="btn btn-primary float-right" href="{{route('medicamentos.create')}}">Agregar medicamentos</a>
            @endcan
        </h3>
    </div>

@include('personalizar.mensaje')
<div class="table-responsive">
    <table id="medicamentos" style="text-align:center"  class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Administracion</th>
                <th>Horario</th>
                <th>Estado</th>
                <th  ></th>
                <th ></th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicamentos as $medicamento)
            <tr>
                <td> {{$medicamento->id}}</td>
                <td> {{$medicamento->nombre}}</td>
                <td> {{$medicamento->cantidad}}</td>
                <td> {{$medicamento->administracion}}</td>
                <td> {{$medicamento->horario}} horas</td>
                @if($medicamento->estado == "activo")
                    <td style='background-color:RGB(72,201,176)' > {{$medicamento->estado}}</td>
                @else
                    <td style='background-color:RGB(216,103,83)' > {{$medicamento->estado}}</td>
                @endif
                <td > <a href="{{route('medicamentos.show', $medicamento->id)}}" class="btn btn-outline-info "> Ver </a></td>

                <td > <a href="{{route('medicamentos.edit', $medicamento->id)}}" class="btn btn-outline-success " > Editar </a></td>
                <td >
                    <form action="{{route('medicamentos.destroy', $medicamento->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el {{$medicamento->id}}?')">Eliminar</button>
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
    $(document).ready(function(){
        $('#medicamentos').DataTable();
    });
</script>


