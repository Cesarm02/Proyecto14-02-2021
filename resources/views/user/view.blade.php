@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                <input disabled type="text" class="form-control" id="name" placeholder="Nombre" name="nombre" value="{{old('name', $user->name)}}">
                            </div>

                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="email" placeholder="email|" name="email" value="{{old('email', $user->email)}}">
                            </div>

                             <div class="form-group">
                                <select disabled class="form-control" name="roles" id="roles">
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
