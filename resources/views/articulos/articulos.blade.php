@extends('layouts.app')

@section('content')
<div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('articulo')}}">Foro</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$articulos->titulo}}</li>
        </ol>
        </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title"> Titulo : {{$articulos->titulo}}, Categoria : {{$articulos->categoria}}</h5>
                    </div>
                    @if($articulos->imagen)
                        <img src="{{ URL::to('/') }}/storage/{{ $articulos->imagen }}" style="width:320px !important; height:240px !important" class="card-img-top">
                        {{-- <img src="{{$articulo->get_imagen}}" class="card-img-top"> --}}
                    
                    @endif
                    <p class="card-text"> 
                        {{$articulos->descripcion}}
                    </p>
                    <p class="text-muted mb-0">
                        @if($articulos->url)
                            Obtenido de : {{$articulos->url}} <br>
                        @endif
                        <em>
                            Publicado por : {{$articulos->informacion_user->users->name}} , 
                        </em>
                        {{$articulos->created_at->format('d M Y')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
