@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editando a : {{$user->name}}</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Editar Usuario</h2>    
                </div>

                <div class="card-body">
                    @include('personalizar.mensaje')
                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <h3>Datos requerido</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{old('name', $user->name)}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="email|" name="email" value="{{old('email', $user->email)}}">
                            </div>

                            

                             <div class="form-group">
                                <select class="form-control" name="roles" id="roles">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"
                                            @isset($user->roles[0]->nombre)
                                                @if($role->nombre == $user->roles[0]->nombre)
                                                    selected
                                                @endif
                                            @endisset
                                            >{{$role->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>  
                         
                            <hr>
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
