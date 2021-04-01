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

        <div class="card-body">
            <blockquote class="blockquote mb-0">

                <div class="row">
                    <div class="card border-info mb-4" style="max-width: 18rem; margin-right: 25px; margin-left: 25px;">
                        <div class="card-header bg-transparent border-info">Manual tenico</div>
                        <div class="card-body">
                            <p class="card-text">El manual tecnico es utilizado por aquellas personas que brindaran soporte o desarrollaran modulos en el aplicativo</p>
                        </div>
                        <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>

                    </div>
                    <div class="card border-info mb-4" style="max-width: 18rem;  margin-right: 25px; margin-left: 25px;">
                        <div class="card-header bg-transparent border-info">Manual del usuario</div>
                        <div class="card-body ">
                            <p class="card-text ">El manual del usuario, permite conocer al usuario las funcionalidades y descripción del sistema </p>
                        </div>
                        <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>

                    </div>
                </div>

                <footer class="blockquote-footer">ADMINISTRADOR <cite title="Source Title">Manuales</cite></footer>
            </blockquote>
        </div>
    </div>
</div>
@endsection