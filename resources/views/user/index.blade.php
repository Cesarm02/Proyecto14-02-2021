@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Lista de users 
                    </h2>
                </div>
                <div class="card-body">
                    @include('personalizar.mensaje')
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol(es)</th>
                                <th colspan="3"></th>
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
                                                    <button class="btn btn-outline-danger"> Eliminar </button>
                                                </form>
                                                @endcan
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
