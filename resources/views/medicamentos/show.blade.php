@extends('layouts.app')

@section('content')
<div class="container">
        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('medicamentos.index')}}">Medicamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{old('nombre', $medicamento->nombre)}}</li>

    </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Revisando ') }} {{$medicamento->nombre}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" value="{{old('nombre', $medicamento->nombre)}}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Cantidad * (Dosis)</label>
                            <input type="text" name="cantidad" class="form-control" id="cantidad"  value="{{old('nombre', $medicamento->cantidad)}}" readonly> 
                        </div>

                        <div class="form-group">
                            <label >Administración *</label>
                            <select name="administracion" class="form-control" readonly>
                                <option value="" selected>{{$medicamento->administracion}}</option> 

                            </select>
                        </div>
                        <div class="form-group">
                            <label >Especialidad</label>
                            <input type="text" name="especialidad" class="form-control" id="especialidad" value="{{old('nombre', $medicamento->especialidad)}}" readonly> 
                        </div>
                        <div class="form-inline">
                            <label >Horario  (Cada cuanto tiempo)  </label>
                            <input type="number" name="horario" placeholder= "Horas" class="form-control" id="horario" min="1" pattern="^[0-9]+"  value="{{old('nombre', $medicamento->horario)}}" readonly>   
                            <label >  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;Hora_inicio</label>
                            <input type="time" name="hora_inicio" class="form-control" id="hora_inicio" value="{{old('nombre', $medicamento->hora_inicio)}}" readonly> 
                        </div>
                        
                        <div class="form-group">
                            <label >Estado *</label>
                            <select name="estado" class="form-control" readonly>
                                <option > {{ $medicamento->estado}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="comentario" rows="6" class="form-control" readonly> {{$medicamento->comentario}}</textarea>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{route('medicamentos.index')}}"> Volver </a>
                            <a class="btn btn-success" href="{{route('medicamentos.edit',$medicamento->id)}}"> Editar </a>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
