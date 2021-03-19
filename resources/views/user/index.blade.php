@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active">Usuarios</a></li>
    </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Usuarios </strong> 
        </h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Lista de usuarios 
                    </h2>
                </div>
                <div class="card-body">
                    @include('personalizar.mensaje')
                    <div class="table-responsive">

                        <table class="table table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol(es)</th>
                                <th colspan="3" >Acciones</th>
                                <th> Información</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($users as $user)
                                         <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @isset($user->roles[0]->nombre)
                                                    {{$user->roles[0]->nombre}}
                                                @endisset
                                            </td>
                                            <td>
                                                @can('view', [$user, ['user.show', 'userown.show'] ])
                                                <a class="btn btn-outline-info " href="{{route('user.show', $user->id)}}">Ver</a>
                                                @endcan    
                                            <td>
                                                @can('update', [$user, ['user.edit', 'userown.edit']] )
                                                 <a class="btn btn-outline-success " href="{{route('user.edit', $user->id)}}">Editar</a>
                                                @endcan
                                            <td> 
                                                @can('haveaccess', 'user.destroy')
                                                <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el usuario {{$user->name}}?')"> Eliminar </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td>
                                                <form action="{{route('resumen.update', $user->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <button class="btn btn-outline-dark " >Visualizar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                        {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
