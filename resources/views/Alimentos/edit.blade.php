@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('alimentos.index')}}">Alimentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editando Alimento {{$alimento->fecha}}, tipo : {{$alimento->tipo}}</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando') }} {{$alimento->tipo}}, Fecha: {{$alimento->fecha}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('alimentos.update',$alimento->id)}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label >Fecha *</label>
                            <input type="date" name="fecha" class="form-control" value="{{old('fecha', $alimento->fecha)}}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label >Hora * </label>
                            <input type="time" name="hora" class="form-control" id="hora" value="{{old('hora', $alimento->hora)}}" > 
                        </div>

                        <div class="form-group col-md-12">
                            <label >Comida *</label>
                            <select name="tipo" class="form-control">
                                <option value="{{old('tipo', $alimento->tipo)}}" selected>{{old('tipo', $alimento->tipo)}}</option>
                                <option value="almuerzo" >Almuerzo</option>
                                <option value="comida">Comida</option>
                                <option value="refrigerio">Refrigerio</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label >Descripción
                                 </label>
                            <textarea name="descripcion" rows="6" class="form-control" required >{{$alimento->descripcion}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Editar" class="btn btn-primary ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
