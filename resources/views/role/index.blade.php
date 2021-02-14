@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Lista de roles 
                    </h2>
                </div>
                <div class="card-body">
                    @include('personalizar.mensaje')
                    @can('haveaccess', 'role.create')
                    <a class="btn btn-primary float-right" href="{{route('role.create')}}">Crear</a>
                        <br>
                        <br>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Full acceso</th>
                                <th colspan="3"></th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                         <tr>
                                            <th scope="row">{{$role->id}}</th>
                                            <td>{{$role->nombre}}</td>
                                            <td>{{$role->slug}}</td>
                                            <td>{{$role->descripcion}}</td>
                                            <td>{{$role->acceso}}</td>
                                            <td> 
                                                @can('haveaccess', 'role.show')
                                                <a class="btn btn-outline-info " href="{{route('role.show', $role->id)}}">Ver</a>
                                                @endcan
                                                <td> 
                                                    @can('haveaccess', 'role.edit')
                                                    <a class="btn btn-outline-success " href="{{route('role.edit', $role->id)}}">Editar</a>
                                                    @endcan
                                                <td> 
                                                    @can('haveaccess', 'role.destroy')
    
                                                <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger"> Eliminar </button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                        {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
