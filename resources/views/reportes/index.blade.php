@extends('layouts.app')

@section('content')

<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reportes</li>
        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Reportes </strong> 
        </h3>
    </div>

@include('personalizar.mensaje')

<div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-weight"></i> Peso y Altura</h5>
                <p class="card-text">
                Para generar la grafica del detalle de los ultimos 5 registro de peso
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('grafica_peso')}}" class="btn btn-primary">Generar Grafica</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="far fa-newspaper"></i> Artículos</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de Diabetes en general, se encuentra articulos como : ¿Qué es?, Tipos de diabetes, etc.  
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('diabetes')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-book-reader"></i> Manuales</h5>
                <p class="card-text">
                Este icono hace referencia a la sección del manual de usuario, aquí se encuentra detalladamente el uso del aplicativo
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            
        </div>

@endsection