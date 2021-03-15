@extends('layouts.app')
@section('content')
<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perfil</li>

        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> perfil de {{Auth::user()->name}} </strong> 
        </h3>
    </div>

@include('personalizar.mensaje')
  <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Información de ') }} {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('perfil.update', $perfil[0]->id)}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @method('PUT')
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label >Nombres</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label >Apellidos </label>
                            <input type="text" name="apellidos" class="form-control" value="{{$perfil[0]->apellidos}}" > 
                        </div>

                        <div class="form-group col-md-6">
                            <label >Tipo de documento</label>
                            <select name="tipo_documento" class="form-control">
                                <option value="RC" @if($perfil[0]->tipo_documento == 'RC') selected="selected" @endif> Registro civil</option>
                                <option value="TI" @if($perfil[0]->tipo_documento == 'TI') selected="selected" @endif>Tarjeta de identidad</option>
                                <option value="CC"@if($perfil[0]->tipo_documento == 'CC') selected="selected" @endif>Cedula de ciudadania</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Dni (Documento o número de identidad) </label>
                            <input type="text" name="dni" class="form-control" value="{{$perfil[0]->dni}}" > 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Celular </label>
                            <input type="number" name="celular" class="form-control" value="{{$perfil[0]->celular}}" > 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Profesión </label>
                            <input type="text" name="profesion" class="form-control" value="{{$perfil[0]->profesion}}" > 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Fecha nacimiento </label>
                            <input type="date" name="fecha_nacimiento" class="form-control" value="{{$perfil[0]->fecha_nacimiento}}" > 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Edad </label>
                            <input type="number" name="edad" class="form-control" value="{{$perfil[0]->edad}}" readonly > 
                        </div>
                        <div class="form-group col-md-4">
                            <label >Sexo</label>
                            <select name="sexo" class="form-control">
                                <option value="M" @if($perfil[0]->sexo == 'M') selected="selected" @endif >Masculino</option>
                                <option value="F" @if($perfil[0]->sexo == 'F') selected="selected" @endif>Femenino</option>
                                <option value="Otro" @if($perfil[0]->sexo == 'Otro') selected="selected" @endif>Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Grupo sanguineo</label>
                            <select name="grupo_sanguineo" class="form-control">
                                <option value="A" @if($perfil[0]->grupo_sanguineo == "A") selected="selected" @endif>A</option>
                                <option value="B" @if($perfil[0]->grupo_sanguineo == "B") selected="selected" @endif>B</option>
                                <option value="AB" @if($perfil[0]->grupo_sanguineo == "AB") selected="selected" @endif>AB</option>
                                <option value="O" @if($perfil[0]->grupo_sanguineo == "O") selected="selected" @endif>O</option>
                            </select>
                        </div>  
                        <div class="form-group col-md-4">
                            <label >RH</label>
                            <select name="rh" class="form-control">
                                <option value="+" @if($perfil[0]->rh == "+") selected="selected" @endif>+</option>
                                <option value="-" @if($perfil[0]->rh == "-") selected="selected" @endif>-</option>
                            </select>
                        </div>                       

                        <div class="form-group col-md-6">
                            <label >Direccion </label>
                            <input type="text" name="direccion" class="form-control" value="{{$perfil[0]->direccion}}" > 
                        </div>

                        <div class="form-group col-md-6">
                            <label >Ciudad </label>
                            <input type="text" name="ciudad" class="form-control" value="{{$perfil[0]->ciudad}}" > 
                        </div>

                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Actualizar" class="btn btn-primary ">
                        </div>
                    </div>

 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection