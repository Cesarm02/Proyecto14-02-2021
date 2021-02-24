@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('insulinas.index')}}">Insulinas</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Insulina {{old('nombre', $insulina->nombre)}}</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Insulina: ') }}{{$insulina->nombre}}</div>

                <div class="card-body">
                        <div class="form-group">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" value="{{$insulina->nombre}}" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Fecha </label>
                                <input type="date" name="fecha" class="form-control" value = "{{$insulina->fecha}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label >Hora  </label>
                                <input value= "{{$insulina->hora}}" type="time" name="hora" class="form-control" id="hora" readonly> 
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6" >
                                <label >Concentracion</label>
                                <input type="text" name="cantidad" class="form-control" id="cantidad" value ="{{$insulina->concentracion}}" readonly > 
                            </div>
                            <div class="form-group col-md-6">
                                <label >Inicio (cuán rápidamente actúan)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="inicio" class="form-control" id="inicio"  value="{{$insulina->inicio}}" readonly> 
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label >Pico (cuánto demora lograr el impacto máximo)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="pico" class="form-control" id="pico"  value="{{$insulina->pico}}" readonly> 
                            </div>
                            <div class="form-group col-md-6">
                                <label >Duración (cuánto dura antes de desaparecer)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="duracion" class="form-control" id="duracion"  value="{{$insulina->duracion}}" readonly   > 
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Tipo *</label>
                            <select name="tipo" class="form-control"  readonly>
                                <option value="" selected> {{$insulina->tipo}} </option> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Estado *</label>
                            <select name="estado" class="form-control" readonly>
                                <option value="" selected>{{$insulina->estado}}</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="comentario" rows="6" class="form-control" readonly>{{$insulina->comentario}}</textarea>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{route('insulinas.index')}}"> Volver </a>
                            <a class="btn btn-success" href="{{route('insulinas.edit',$insulina->id)}}"> Editar </a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
