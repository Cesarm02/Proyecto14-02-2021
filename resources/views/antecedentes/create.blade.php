@extends('layouts.app')
@section('content')
<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active">Perfil</li>
            <li class="breadcrumb-item"><a href="{{route('antecedentes.index')}}">Antecedentes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Creando antecedente</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Antecedente') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('antecedentes.store')}}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label >Tipo de antecedente *</label>
                            <select name="tipo" class="form-control">
                                <option value="antecedentes_personales" selected>Antecedente Personal</option>
                                <option value="antecedentes_familiares" >Antecedente Familiar</option>
                                <option value="alergias">Alergia</option>
                                <option value="vacunas">Vacuna</option>
                                <option value="tratamientos">Tratamiento</option>
                                <option value="intervenciones_quirúrgicas">Intervenciones quirúrgica</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label >Fecha diagnostico</label>
                            <input type="date" name="fecha_diagnostico" class="form-control" >
                        </div>
                        <div class="form-group col-md-12">
                            <label >Nombre *</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                    </div>
                        <div class="form-group">
                            <label >Descripción </label>
                            <textarea name="descripcion" rows="6" class="form-control" ></textarea>
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
