@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('medicamentos.index')}}">Medicamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar medicamento</li>

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
                        action="{{route('medicamentos.store')}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Cantidad * (Dosis)</label>
                            <input type="text" name="cantidad" class="form-control" id="cantidad"  placeholder=" X mg" required> 
                        </div>

                        <div class="form-group">
                            <label >Administración *</label>
                            <select name="administracion" class="form-control">
                                <option value="" selected>-- Seleccione --</option> 
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
                            <input type="text" name="especialidad" class="form-control" id="especialidad" > 
                        </div>
                        <div class="form-inline">
                            <label >Horario  (Cada cuanto tiempo)  </label>
                            <input type="number" name="horario" placeholder= "Horas" class="form-control" id="horario" min="1" pattern="^[0-9]+" >   
                            <label >  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;Hora_inicio</label>
                            <input type="time" name="hora_inicio" class="form-control" id="hora_inicio" > 
                        </div>
                        
                        <div class="form-group">
                            <label >Estado *</label>
                            <select name="estado" class="form-control" required>
                                <option value="activo" selected>Activo</option>
                                <option value="inactivo" >Inactivo</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label >Comentarios </label>
                            <textarea name="comentario" rows="6" class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Agregar" class="btn btn-primary ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
