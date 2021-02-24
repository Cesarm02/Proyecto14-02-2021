@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('insulinas.index')}}">Insulinas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Insulinas</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Insulinas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('insulinas.store')}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Fecha </label>
                                <input type="date" name="fecha" class="form-control" >
                            </div>
                            <div class="form-group col-md-4">
                                <label >Hora  </label>
                                <input type="time" name="hora" class="form-control" id="hora" > 
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6" >
                                <label >Concentracion</label>
                                <input type="text" name="concentracion" class="form-control" id="concentracion" > 
                            </div>
                            <div class="form-group col-md-6">
                                <label >Inicio (cuán rápidamente actúan)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="inicio" class="form-control" id="inicio" placeholder="Horas" > 
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label >Pico (cuánto demora lograr el impacto máximo)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="pico" class="form-control" id="pico" placeholder="Horas"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label >Duración (cuánto dura antes de desaparecer)</label>
                                <input type="number" min="1" pattern="^[0-9]+" name="duracion" class="form-control" id="duracion"placeholder="Horas"     > 
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Tipo *</label>
                            <select name="tipo" class="form-control" required>
                                <option value="" selected>-- Seleccione --</option> 
                                <option value="rapida">Rapida</option>
                                <option value="lenta">Lenta</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Estado *</label>
                            <select name="estado" class="form-control" required>
                                <option value="" selected>-- Seleccione --</option> 
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
                            <textarea name="comentario" rows="6" class="form-control" ></textarea>
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
