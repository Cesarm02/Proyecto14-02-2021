@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Crear rol</h2>    
                </div>

                <div class="card-body">
                    @include('personalizar.mensaje')
                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="container">
                            <h3>Data requerido</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Nombre" name="nombre" value="{{old('nombre')}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{old('slug')}}">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Descripción"  name="descripcion" id="descripcion" rows="3"> {{old('descripcion')}} </textarea>
                            </div>
                            <hr>
                            <h3> Acceso total</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesoSi" name="acceso" class="custom-control-input" value="si" @if(old('acceso') == 'si') checked @endif>
                                <label class="custom-control-label" for="accesoSi">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="accesoNo" name="acceso" class="custom-control-input" value="no" @if(old('acceso') == 'no') checked @endif @if(old('acceso') === null) checked @endif>
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
