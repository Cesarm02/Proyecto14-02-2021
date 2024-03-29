@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Artículo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                        action="{{route('publicaciones.store')}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label >Título *</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        {{-- <div class="form-group">
                            <label >Imagen </label>
                            <input type="file" name="file" >
                        </div>  --}}

                        <div class="form-group">
                            <label >Categoria *</label>
                            <select name="categoria" class="form-control">
                                <option value="" selected>-- Seleccione --</option> 
                                <option value="medicamentos">Medicamentos</option>
                                <option value="glucometrias" >Glucometrías</option>
                                <option value="ejercicio">Ejercicio</option>
                                <option value="comidas">Comidas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Contenido *</label>
                            <textarea name="descripcion" rows="6" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Enviar" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
