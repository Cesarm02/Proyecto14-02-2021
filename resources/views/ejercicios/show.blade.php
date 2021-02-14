@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('ejercicio.index')}}">Ejercicios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Revisando {{$ejercicio->fecha}}, Hora: {{$ejercicio->hora}}</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Revisando') }} {{old('nombre', $ejercicio->fecha)}}, Hora:  {{$ejercicio->hora}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label >Fecha *</label>
                            <input type="date" name="fecha" class="form-control" value="{{old('fecha', $ejercicio->fecha)}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Hora * </label>
                            <input type="time" name="hora" class="form-control" id="hora" value="{{old('hora', $ejercicio->hora)}}" readonly> 
                        </div>

                        <div class="form-group col-md-12">
                            <label >Tipo ejercicio *</label>
                            <select name="tipo_ejercicio" class="form-control">
                                <option value="" selected>{{old('tipo', $ejercicio->tipo_ejercicio)}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label >Tiempo ejercicio [Minutos]</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="number" min="1" pattern="^[0-9]+" name="tiempo_ejercicio" class="form-control" id="tiempo_ejercicio" value="{{old('tiempo_ejercicio', $ejercicio->tiempo_ejercicio)}}" readonly> 
                        </div>
                        <div class="form-group col-md-1">
                            <label >Minutos</label>
                        </div>
                    </div>
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="descripcion" rows="6" class="form-control" readonly> {{$ejercicio->descripcion}}</textarea>

                        </div>
                        <div class="form-group">
                           <a class="btn btn-primary" href="{{route('ejercicio.index')}}"> Volver </a>
                            <a class="btn btn-success" href="{{route('ejercicio.edit',$ejercicio->id)}}"> Editar </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
