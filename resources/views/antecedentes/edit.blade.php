@extends('layouts.app')
@section('content')
<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active">Perfil</li>
            <li class="breadcrumb-item"><a href="{{route('antecedentes.index')}}">Antecedentes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editando antecedente {{$antecedente->nombre}}</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando Antecedente') }}  {{$antecedente->nombre}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('antecedentes.update', $antecedente->id)}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                     @csrf
                        @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label >Tipo de antecedente *</label>
                            <select name="tipo" class="form-control">
                                <option value="{{old('tipo', $antecedente->tipo)}}" >{{old('tipo', $antecedente->tipo)}}</option>

                                <option value="antecedentes_personales" >Antecedente Personal</option>
                                <option value="antecedentes_familiares" >Antecedente Familiar</option>
                                <option value="alergias">Alergia</option>
                                <option value="vacunas">Vacuna</option>
                                <option value="tratamientos">Tratamiento</option>
                                <option value="intervenciones_quirúrgicas">Intervenciones quirúrgica</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label >Fecha diagnostico</label>
                            <input type="date" name="fecha_diagnostico"  value="{{old('fecha_diagnostico', $antecedente->fecha_diagnostico)}}" class="form-control" >
                        </div>
                        <div class="form-group col-md-12">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" value="{{old('nombre', $antecedente->nombre)}}" class="form-control" required>
                        </div>

                    </div>
                        <div class="form-group">
                            <label >Descripción </label>
                            <textarea name="descripcion" rows="6" class="form-control" >{{$antecedente->descripcion}}</textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Editar" class="btn btn-primary ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
