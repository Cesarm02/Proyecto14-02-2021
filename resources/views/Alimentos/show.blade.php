@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('alimentos.index')}}">Alimentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{old('nombre', $alimento->fecha)}}, Hora:  {{$alimento->hora}}</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rvisando ') }} {{old('nombre', $alimento->fecha)}}, Hora:  {{$alimento->hora}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label >Fecha *</label>
                            <input type="date" name="fecha" class="form-control" value="{{old('fecha', $alimento->fecha)}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Hora * </label>
                            <input type="time" name="hora" class="form-control" id="hora" value="{{old('hora', $alimento->hora)}}" readonly> 
                        </div>

                        <div class="form-group col-md-12">
                            <label >Comida *</label>
                            <select name="tipo" class="form-control">
                                <option value="" readonly>{{old('tipo', $alimento->tipo)}}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label >Descripción
                                 </label>
                            <textarea name="descripcion" rows="6" class="form-control" readonly >{{$alimento->descripcion}}</textarea>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" href="{{route('alimentos.index')}}"> Volver </a>
                            <a class="btn btn-success" href="{{route('alimentos.edit',$alimento->id)}}"> Editar </a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
