@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Artículos</li>
    </ol>
    </nav>

    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Artículos </strong></h3>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8" style="padding-bottom: 10px">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/hzzkfNqZk6Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <br>

        <div class="col-md-8">
            <div class="card-header">
                    <h2>
                        Datos de la diabetes
                        @can('haveaccess', 'diabetes.create')
                            <a class="btn btn-primary float-right" href="{{route('diabetes.create')}}">Crear</a>
                        @endcan
                    </h2>
                    @include('personalizar.mensaje')
                    
            </div>

            @foreach($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header">
                            <h5 
                                class="card-title"> {{$post->titulo}}
                                @can('haveaccess', 'diabetes.edit')
                                    <a class="btn btn-outline-success float-right" href="{{route('diabetes.edit', $post->id)}}">Editar</a>
                                @endcan

                            </h5>
                        </div>

                        @if($post->imagen)
                            <img src="{{ URL::to('/') }}/storage/{{ $post->imagen }}" style="width:320px !important; height:240px !important">
                        @endif


                        <p class="card-text"> 
                            {{-- {{$post->get_excerpt}}  --}}
                            {{-- <a href="{{route('post', $post)}}">Leer mas </a> --}}
                            {{$post->descripcion}}
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                &ndash; {{$post->informacion_user->nombre}}
                            </em>
                            {{$post->created_at->format('d M Y')}}
                        </p>
                    </div>
                 </div>

            @endforeach
            <!-- PAGINACION PAGECONTROLLER-->
            {{$posts->links()}}
    </div>
</div>
@endsection
