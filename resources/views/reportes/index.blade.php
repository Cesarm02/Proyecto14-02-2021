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
                <h5 class="card-title"><i class="fas fa-dumbbell"></i> Ejercicio</h5>
                <p class="card-text">
                Para generar la grafica de los ultimos 7 registros de ejercicio en su tiempo y fecha
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('grafica_ejercicio')}}" class="btn btn-primary">Generar Grafica</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-clock"></i> Glucometrías</h5>
                    <p class="card-text">
                        Para generar la grafica de los ultimos 7 registros de glucosa con su valor y fecha
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><a href="{{route('grafica_glucometria')}}" class="btn btn-primary">Generar Grafica</a></small>
                </div>
                
            </div>
            
        </div>

@endsection