@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Artículo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                        action="{{route('diabetes.update', $comentario)}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label >Título *</label>
                            <input type="text" name="titulo" class="form-control" required value="{{old('titulo', $comentario->titulo)}}">
                        </div>
                        <div class="form-group">
                            <label >Imagen </label>
                            <input type="file" name="file" >
                        </div>
                        <div class="form-group">
                            <label >Contenido *</label>
                            <textarea name="descripcion" rows="6" class="form-control" required>{{old('descripcion', $comentario->descripcion)}}</textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Enviar" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                    <form action="{{route('diabetes.destroy', $comentario)}}" method="POST">

                    @csrf
                    @method('DELETE')
                    <input 
                        type="submit" 
                        value="Eliminar" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Desea eliminar el {{$comentario->id}}?')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
