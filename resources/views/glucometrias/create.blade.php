@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('glucometrias.index')}}">Glucometrías</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Glucometría</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Glucometrías') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('glucometrias.store')}}" 
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

                        <div class="form-group col-md-8">
                            <label >Comida *</label>
                            <select name="tipo" class="form-control">
                                <option value="desayuno" selected>Desayuno</option>
                                <option value="almuerzo" >Almuerzo</option>
                                <option value="comida">Comida</option>
                                <option value="refrigerio">Refrigerio</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Horario *</label>
                            <select name="tipo_hora" class="form-control">
                                <option value="antes" selected>Antes</option>
                                <option value="despues">Despues</option>
                            </select>
                        </div>
                    </div>
                        

                        <div class="form-group">
                            <label >Valor glucosa *</label>
                            <input type="number" min="1" pattern="^[0-9]+" name="valor_glucometria" class="form-control" id="valor_glucometria" placeholder="mg/dl" > 
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
