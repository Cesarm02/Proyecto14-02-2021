@extends('layouts.app')


@section('content')

<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active" ><a href="{{route('reportes.index')}}">Reportes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Formulario</li>

        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Reportes </strong> 
        </h3>
    </div>

@include('personalizar.mensaje')

 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Generador de graficas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('reportes.store')}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label >Fecha inicio *</label>
                            <input type="date" name="fecha_inicio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Fecha final *</label>
                            <input type="date" name="fecha_final" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label >Categoría *</label>
                            <select name="categoria" class="form-control" required> 
                                <option value="peso" selected>Peso y Altura</option>
                                <option value="ejercicio" >Ejercicio</option>
                                <option value="glucometria" >Glucometría</option>
                            </select>
                        </div>
 
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Generar" class="btn btn-primary ">
                        </div>
                    </form>
                </div>
        



            </div>
        </div>
    </div>


@endsection