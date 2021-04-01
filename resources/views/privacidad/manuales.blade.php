@extends('layouts.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manuales</li>
    </ol>
    </nav>
    
    <div class="card">
        <div class="alert alert-info class=card-header" role="alert">
            <h3> Manuales</h3>
        </div>

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-book-reader"> </i>Manual tenico</h5>
                <p class="card-text">
                >El manual tecnico es utilizado por aquellas personas que brindaran soporte o desarrollaran modulos en el aplicativo
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-book-reader"></i> Manual del usuario</h5>
                <p class="card-text">
                El manual del usuario, permite conocer al usuario las funcionalidades y descripción del sistema
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
                <footer class="blockquote-footer">ADMINISTRADOR <cite title="Source Title">Manuales</cite></footer>
        </div>

    </div>
</div>
@endsection