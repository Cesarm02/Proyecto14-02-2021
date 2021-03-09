@extends('layouts.app')

@section('content')
<div class="container">
        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('glucometrias.index')}}">Glucometrias</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{old('nombre', $glucometria->fecha)}}, Hora:  {{$glucometria->hora}}</li>
    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Revisando ') }} {{old('nombre', $glucometria->fecha)}}, Hora:  {{$glucometria->hora}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-row">
                        
                        <div class="form-group col-md-8">
                            <label >Fecha </label>
                            <input type="date" name="fecha" class="form-control" value="{{old('fecha', $glucometria->fecha)}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Hora  </label>
                            <input type="time" name="hora" class="form-control" id="hora" value="{{old('hora', $glucometria->hora)}}" readonly> 
                        </div>

                        <div class="form-group col-md-8">
                            <label >Comida </label>
                            <select name="tipo" class="form-control" readonly>
                                <option value="" selected>{{old('tipo', $glucometria->tipo)}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Horario </label>
                            <select name="tipo_hora" class="form-control" readonly>
                                <option value="">{{old('tipo_hora', $glucometria->tipo_hora)}}</option>
                            </select>
                        </div>
                    </div>
                        

                        <div class="form-group">
                            <label >Valor glucosa </label>
                            <input type="number" min="1" pattern="^[0-9]+" name="valor_glucometria" class="form-control" id="valor_glucometria"  value="{{old('valor_glucometria', $glucometria->valor_glucometria)}} "  readonly> 
                        </div>
  
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="descripcion" rows="6" class="form-control" readonly> {{$glucometria->descripcion}}</textarea>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{route('glucometrias.index')}}"> Volver </a>
                            <a class="btn btn-success" href="{{route('glucometrias.edit',$glucometria->id)}}"> Editar </a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
