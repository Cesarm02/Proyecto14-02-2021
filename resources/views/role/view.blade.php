@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('role.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$role->nombre}}</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Revisando rol = {{$role->nombre}}</h2>    
                </div>

                <div class="card-body">
                    @include('personalizar.mensaje')
                    <form action="{{route('role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <h3>Datos requerido</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Nombre" name="nombre" value="{{old('nombre', $role->nombre)}}" readonly>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{old('slug', $role->slug)}}" readonly>
                            </div>

                            <div class="form-group">
                                <textarea readonly class="form-control" placeholder="Descripción"  name="descripcion" id="descripcion" rows="3"> {{old('descripcion', $role->descripcion)}} </textarea>
                            </div>
                            <hr>
                            <h3> Acceso total</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="accesoSi" name="acceso" class="custom-control-input" value="si" @if($role['acceso']== 'si') checked @elseif(old('acceso') == 'si') checked @endif>
                                <label class="custom-control-label" for="accesoSi">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="accesoNo" name="acceso" class="custom-control-input" value="no" @if($role['acceso']== 'no') checked @elseif(old('acceso') == 'no') checked @endif >
                                <label class="custom-control-label" for="accesoNo">No</label>
                            </div>
                            <hr>

                            <h3>Lista de permisos</h3>
                            
                            @foreach ($permisos as $permiso)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" 
                                    disabled
                                        class="custom-control-input" 
                                        id="permiso_{{$permiso->id}}"
                                        value="{{$permiso->id}}"
                                        name="permiso[]"
                                        @if( is_array(old('permiso')) && in_array("$permiso->id", old('permiso')) )
                                            checked
                                        @elseif( is_array($permiso_rol) && in_array("$permiso->id", $permiso_rol) )
                                            checked                                            
                                        @endif
                                        >
                                    <label class="custom-control-label" for="permiso_{{$permiso->id}}">{{$permiso->id}} - {{$permiso->nombre}} <em> ({{$permiso->descripcion}}) </em></label>
                                </div>
                            @endforeach
                            <hr>
                            <a class="btn btn-success" href="{{route('role.edit',$role->id)}}"> Editar </a>
                            <a class="btn btn-primary" href="{{route('role.index')}}"> Volver </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
