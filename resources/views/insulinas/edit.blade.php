@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('insulinas.index')}}">Insulinas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editando Insulina {{old('nombre', $insulina->nombre)}}</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando Insulina: ') }}{{$insulina->nombre}}</div>

                <div class="card-body">
                      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('insulinas.update', $insulina->id)}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                     @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" value="{{$insulina->nombre}}" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Fecha </label>
                                <input type="date" name="fecha" class="form-control" value = "{{$insulina->fecha}}" >
                            </div>
                            <div class="form-group col-md-4">
                                <label >Hora  </label>
                                <input value= "{{$insulina->hora}}" type="time" name="hora" class="form-control" id="hora" > 
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6" >
                                <label >Concentracion</label>
                                <input type="text" name="cantidad" class="form-control" id="cantidad" value ="{{$insulina->concentracion}}"  > 
                            </div>
                            <div class="form-group col-md-6">
                                <label >Inicio (cuán rápidamente actúan)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="inicio" class="form-control" id="inicio"  value="{{$insulina->inicio}}" > 
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label >Pico (cuánto demora lograr el impacto máximo)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="pico" class="form-control" id="pico"  value="{{$insulina->pico}}" > 
                            </div>
                            <div class="form-group col-md-6">
                                <label >Duración (cuánto dura antes de desaparecer)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="duracion" class="form-control" id="duracion"  value="{{$insulina->duracion}}"    > 
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Tipo *</label>
                            <select name="tipo" class="form-control"  required>
                                <option value="{{$insulina->tipo}}" selected> {{$insulina->tipo}} </option> 
                                <option value="rapida">Rapida</option>
                                <option value="lenta">Lenta</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Estado *</label>
                            <select name="estado" class="form-control" required>
                                <option value="{{$insulina->estado}}" selected>{{$insulina->estado}}</option> 
                                <option value="alegre">Alegre</option>
                                <option value="triste">Triste</option>
                                <option value="enfadado">Enfadado</option>
                                <option value="estresado">Estresado</option>
                                <option value="cansado">Cansado</option>
                                <option value="relajado">Relajado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="comentario" rows="6" class="form-control" >{{$insulina->comentario}}</textarea>
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
