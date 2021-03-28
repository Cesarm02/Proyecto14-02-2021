@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active">Foro</li>
        <li class="breadcrumb-item active" aria-current="page">Mis publicaciones</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Artículos') }}
                @can('haveaccess', 'articulos.create')

                    <a href="{{route('publicaciones.create')}} " class="btn btn-sm btn-primary float-right"> Crear </a>
                @endcan
                </div>

                <div class="card-body ">
                    @include('personalizar.mensaje')
                        <div class="table-responsive">
                            <table class="table table-responsive" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Título</th>
                                        <th>Categoria</th>
                                        <th COLSPAN=3 class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articulos as $articulo)
                                        <tr>
                                            <td>{{$articulo->id}}</td>
                                            <td>{{$articulo->titulo}}</td>
                                            <td>{{$articulo->categoria}}</td>
    
                                            <td><a href="{{route('articulos', $articulo)}}" class="btn btn-outline-primary btn-sm">ver</a></td>
                                            <td><a href="{{route('publicaciones.edit', $articulo)}}" class="btn btn-outline-success btn-sm">Editar</a></td>
    
                                            <td>
                                                <form action="{{route('publicaciones.destroy', $articulo)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input 
                                                    type="submit" 
                                                    value="Eliminar" 
                                                    class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('¿Desea eliminar el {{$articulo->id}}?')">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
