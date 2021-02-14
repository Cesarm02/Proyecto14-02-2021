@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('ejercicio.index')}}">Ejercicios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrar Ejercicios</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Ejercicios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('ejercicio.store')}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label >Fecha *</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Hora * </label>
                            <input type="time" name="hora" class="form-control" id="hora" required> 
                        </div>

                        <div class="form-group col-md-12">
                            <label >Tipo ejercicio *</label>
                            <select name="tipo_ejercicio" class="form-control">
                                <option value="alto" selected>Alto</option>
                                <option value="medio" >Medio</option>
                                <option value="bajo">Bajo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label >Tiempo ejercicio [Minutos]</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="number" min="1" pattern="^[0-9]+" name="tiempo_ejercicio" class="form-control" id="valor_glucometria" > 
                        </div>
                        <div class="form-group col-md-1">
                            <label >Minutos</label>
                        </div>
                    </div>
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="descripcion" rows="6" class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Agregar" class="btn btn-primary ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
