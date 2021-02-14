@extends('layouts.app')

@section('content')
<div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active" >Foro</li>
            <li class="breadcrumb-item active" aria-current="page">Comidas</li>
        
        </ol>
        </nav>
        <div class="alert alert-info class=card-header" role="alert">
            <h3> Sección de <strong> Foro Comidas </strong></h3>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($articulos as $articulo)
            <div class="card mb-4">
                <div class="card-body">
                        <div class="card-header">
                            <h5 class="card-title"> {{$articulo->titulo}}</h5>
                            Categoria: {{$articulo->categoria}}

                        </div class="">
                            @if($articulo->imagen)
                                <img src="{{ URL::to('/') }}/storage/{{ $articulo->imagen }}" style="width:320px !important; height:240px !important" class="card-img-top">
                                {{-- <img src="{{$articulo->get_imagen}}" class="card-img-top"> --}}
                        
                            @endif
                        <p class="card-text"> 
                            {{$articulo->get_excerpt}} 
                            <a href="{{route('articulos', $articulo)}}">Leer mas </a>
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                Publicado por: &ndash; {{$articulo->informacion_user->users->name}},
                            </em>
                            {{$articulo->created_at->format('d M Y')}}
                        </p>
                    </div>
                 </div>

            @endforeach
            <!-- PAGINACION PAGECONTROLLER-->
            {{$articulos->links()}}
            
    </div>
</div>
@endsection
