@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('medicamentos.index')}}">Medicamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editando medicamento</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Medicamentos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('medicamentos.update', $medicamento->id)}}" 
                        method="POST"
                    >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" value="{{old('nombre', $medicamento->nombre)}}" >
                        </div>
                        <div class="form-group">
                            <label >Cantidad * (Dosis)</label>
                            <input type="text" name="cantidad" class="form-control" id="cantidad"  value="{{old('nombre', $medicamento->cantidad)}}" > 
                        </div>

                        <div class="form-group">
                            <label >Administración *</label>
                            <select name="administracion" class="form-control" >
                                <option value="{{$medicamento->administracion}}" selected>{{$medicamento->administracion}}</option> 
                                <option value="oral">oral</option>
                                <option value="tópica" >tópica</option>
                                <option value="transdérmica">transdérmica</option>
                                <option value="ótica">ótica</option>
                                <option value="intranasal">intranasal</option>
                                <option value="inhalatoria">inhalatoria</option>
                                <option value="intravenosa">intravenosa</option>
                                <option value="intramuscular">intramuscular</option>
                                <option value="subcutánea">subcutánea</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Especialidad</label>
                            <input type="text" name="especialidad" class="form-control" id="especialidad" value="{{old('nombre', $medicamento->especialidad)}}" > 
                        </div>
                        <div class="form-inline">
                            <label >Horario  (Cada cuanto tiempo)  </label>
                            <input type="number" name="horario" placeholder= "Horas" class="form-control" id="horario" min="1" pattern="^[0-9]+"  value="{{old('nombre', $medicamento->horario)}}" >   
                            <label >  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;Hora_inicio</label>
                            <input type="time" name="hora_inicio" class="form-control" id="hora_inicio" value="{{old('nombre', $medicamento->hora_inicio)}}" > 
                        </div>
                        
                        <div class="form-group">
                            <label >Estado *</label>
                            <select name="estado" class="form-control">
                                <option value="{{$medicamento->estado}}" selected>{{$medicamento->estado}}</option>
                                <option value="activo" >Activo</option>
                                <option value="inactivo" >Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="comentario" rows="6" class="form-control" > {{$medicamento->comentario}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Editar" class="btn btn-primary ">
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
