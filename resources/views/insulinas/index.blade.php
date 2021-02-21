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

@endsection