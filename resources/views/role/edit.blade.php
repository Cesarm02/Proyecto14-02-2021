@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Editar rol</h2>    
                </div>

                <div class="card-body">
                    @include('personalizar.mensaje')
                    <form action="{{route('role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <h3>Datos requerido</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{old('nombre', $role->nombre)}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{old('slug', $role->slug)}}">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Descripción"  name="descripcion" id="descripcion" rows="3"> {{old('descripcion', $role->descripcion)}} </textarea>
                            </div>
                            <hr>
                            <h3> Acceso total</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesoSi" name="acceso" class="custom-control-input" value="si" @if($role['acceso']== 'si') checked @elseif(old('acceso') == 'si') checked @endif>
                                <label class="custom-control-label" for="accesoSi">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesoNo" name="acceso" class="custom-control-input" value="no" @if($role['acceso']== 'no') checked @elseif(old('acceso') == 'no') checked @endif >
                                <label class="custom-control-label" for="accesoNo">No</label>
                            </div>
                            <hr>

                            <h3>Lista de permisos</h3>
                            
                            @foreach ($permisos as $permiso)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" 
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
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
