@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Revisando Usuario =  {{$user->name}}</h2>    
                </div>

                <div class="card-body">
                    @include('personalizar.mensaje')
                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                          <h3>Datos requerido</h3>
                    <div class="form-row">

                        <div class="form-group col-md-6">       
                            <label >Email</label>
                            <input disabled type="text" class="form-control" id="email" placeholder="email" name="email" value="{{old('email', $user->email)}}">
                        </div>

                         <div class="form-group col-md-6">
                            <label >Rol</label>
                            <select disabled class="form-control" name="roles" id="roles">
                                <option value=""  selected="selected" > {{$informacion->users->roles[0]->nombre}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Nombres</label>
                            <input type="text" name="name" class="form-control" value="{{$informacion->users->name}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Apellidos </label>
                            <input type="text" name="apellidos" class="form-control" value="{{$informacion->apellidos}}" readonly> 
                        </div>

                        <div class="form-group col-md-6">
                            <label >Tipo de documento</label>
                            <select disabled name="tipo_documento" class="form-control" >
                                <option value="RC" @if($informacion->tipo_documento == 'RC') selected="selected" @endif> Registro civil</option>
                                <option value="TI" @if($informacion->tipo_documento == 'TI') selected="selected" @endif>Tarjeta de identidad</option>
                                <option value="CC"@if($informacion->tipo_documento == 'CC') selected="selected" @endif>Cedula de ciudadania</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Dni (Documento o número de identidad) </label>
                            <input type="text" name="dni" class="form-control" value="{{$informacion->dni}}" readonly> 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Celular </label>
                            <input type="number" name="celular" class="form-control" value="{{$informacion->celular}}" readonly> 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Profesión </label>
                            <input type="text" name="profesion" class="form-control" value="{{$informacion->profesion}}" readonly> 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Fecha nacimiento </label>
                            <input type="date" name="fecha_nacimiento" class="form-control" value="{{$informacion->fecha_nacimiento}}" readonly> 
                        </div>
                        <div class="form-group col-md-6">
                            <label >Edad </label>
                            <input type="number" name="edad" class="form-control" value="{{$informacion->edad}}" readonly > 
                        </div>
                        <div class="form-group col-md-4">
                            <label >Sexo</label>
                            <select disabled name="sexo" class="form-control">
                                <option value="M" @if($informacion->sexo == 'M') selected="selected" @endif >Masculino</option>
                                <option value="F" @if($informacion->sexo == 'F') selected="selected" @endif>Femenino</option>
                                <option value="Otro" @if($informacion->sexo == 'Otro') selected="selected" @endif>Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Grupo sanguineo</label>
                            <select disabled  name="grupo_sanguineo" class="form-control">
                                <option value="A" @if($informacion->grupo_sanguineo == "A") selected="selected" @endif>A</option>
                                <option value="B" @if($informacion->grupo_sanguineo == "B") selected="selected" @endif>B</option>
                                <option value="AB" @if($informacion->grupo_sanguineo == "AB") selected="selected" @endif>AB</option>
                                <option value="O" @if($informacion->grupo_sanguineo == "O") selected="selected" @endif>O</option>
                            </select>
                        </div>  
                        <div class="form-group col-md-4">
                            <label >RH</label>
                            <select disabled name="rh" class="form-control">
                                <option value="+" @if($informacion->rh == "+") selected="selected" @endif>+</option>
                                <option value="-" @if($informacion->rh == "-") selected="selected" @endif>-</option>
                            </select>
                        </div>                       

                        <div class="form-group col-md-6">
                            <label >Direccion </label>
                            <input type="text" name="direccion" class="form-control" value="{{$informacion->direccion}}" readonly > 
                        </div>

                        <div class="form-group col-md-6">
                            <label >Ciudad </label>
                            <input type="text" name="ciudad" class="form-control" value="{{$informacion->ciudad}}" readonly> 
                        </div>  
                    </div>
                            <hr>
                            <a class="btn btn-success" href="{{route('user.edit',$user->id)}}"> Editar </a>
                            <a class="btn btn-primary" href="{{route('user.index')}}"> Volver </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
