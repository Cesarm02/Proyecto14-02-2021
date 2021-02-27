@extends('layouts.app')
   <head>
    <link rel="stylesheet" href="css/collapse.css"> 
    
 </head>

@section('content')
<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active">Perfil</li>
            <li class="breadcrumb-item active" aria-current="page">Antecedentes</li>

        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Antecedentes </strong> 
            @can('haveaccess', 'antecedentes.create')
                <a class="btn btn-primary float-right" href="{{route('antecedentes.create')}}">Agregar Antecedentes</a>
            @endcan
        </h3>
    </div>
@include('personalizar.mensaje')
<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Antecedentes Personales
      </h4>
    </div>
    @foreach($personales as $personal)
      <div class="card-header shadow" id="{{$personal->id}}" role="button" data-toggle="collapse" href="#collapse{{$personal->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
        <h5 class="panel-title">
          <a>
            {{$personal->nombre}}
          </a>
        </h5>
      </div>
    
      <div id="collapse{{$personal->id}}" class="panel-collapse collapse" aria-labelledby="{{$personal->id}}" data-parent="#accordionExample">
        <div class= "card-body">
          {{$personal->descripcion}}
          <br>
          <small> Fecha : {{$personal->fecha_diagnostico}}</small>
          <br>
          <form action="{{route('antecedentes.destroy', $personal->id)}}" method="POST">
            <a class="btn btn-outline-success" href="{{route('antecedentes.edit',$personal->id)}}"> Editar </a>
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el dato{{$personal->nombre}}?')">Eliminar</button>
          </form>
        </div>
      </div>
      
    @endforeach
  </div>
</div>


<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">

    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Antecedentes Familiares
      </h4>
    </div>
    @foreach($familiares as $familiar)
      
    <div class="card-header shadow" id="{{$familiar->id}}" role="button" data-toggle="collapse" href="#collpase{{$familiar->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
      <h5 class="panel-title">
        <a>
          {{$familiar->nombre}}
        </a>
      </h5>
    </div>
  
    <div id="collpase{{$familiar->id}}" class="panel-collapse collapse" aria-labelledby="{{$familiar->id}}" data-parent="#accordionExample">
      <div class= "card-body">
          {{$familiar->descripcion}}
          <br>
          <small> Fecha : {{$familiar->fecha_diagnostico}}</small>
          <br>
          <form action="{{route('antecedentes.destroy', $familiar->id)}}" method="POST">
            <a class="btn btn-outline-success" href="{{route('antecedentes.edit',$familiar->id)}}"> Editar </a>
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el dato{{$familiar->nombre}}?')">Eliminar</button>
          </form>
      </div>
    </div>
    @endforeach

  </div>
</div>

<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Alergias
      </h4>
    </div>
    @foreach($alergias as $alergia)
    <div class="card-header shadow" id="{{$alergia->id}}" role="button" data-toggle="collapse" href="#collapse{{$alergia->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
      <h5 class="panel-title">
        <a>
          {{$alergia->nombre}}
        </a>
      </h5>
    </div>
  
    <div id="collapse{{$alergia->id}}" class="panel-collapse collapse" aria-labelledby="{{$alergia->id}}" data-parent="#accordionExample">
      <div class= "card-body">
        {{$alergia->descripcion}}
        <br>
        <small> Fecha: {{$alergia->fecha_diagnostico}}</small>
        <br>
          <form action="{{route('antecedentes.destroy', $alergia->id)}}" method="POST">
            <a class="btn btn-outline-success" href="{{route('antecedentes.edit',$alergia->id)}}"> Editar </a>
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el dato{{$alergia->nombre}}?')">Eliminar</button>
          </form>
      </div>
    </div>
    @endforeach
  
  </div>
</div>

<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Vacunas
      </h4>
    </div>
    @foreach($vacunas as $vacuna)
      
    <div class="card-header shadow" id="{{$vacuna->id}}" role="button" data-toggle="collapse" href="#collapse{{$vacuna->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
      <h5 class="panel-title">
        <a>
          {{$vacuna->nombre}}
        </a>
      </h5>
    </div>
  
    <div id="collapse{{$vacuna->id}}" class="panel-collapse collapse" aria-labelledby="{{$vacuna->id}}" data-parent="#accordionExample">
      <div class= "card-body">
        {{$vacuna->descripcion}}
        <br>
        <small> Fecha: {{$vacuna->fecha_diagnostico}}</small>
          <br>
          <form action="{{route('antecedentes.destroy', $vacuna->id)}}" method="POST">
            <a class="btn btn-outline-success" href="{{route('antecedentes.edit',$vacuna->id)}}"> Editar </a>
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el dato{{$vacuna->nombre}}?')">Eliminar</button>
          </form>
      </div>
    </div>
    @endforeach

  </div>
</div>

<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Tratamientos
      </h4>
    </div>
    @foreach($tratamientos as $tratamiento)
        
      <div class="card-header shadow" id="{{$tratamiento->id}}" role="button" data-toggle="collapse" href="#collapse{{$tratamiento->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
        <h5 class="panel-title">
          <a>
            {{$tratamiento->nombre}}
          </a>
        </h5>
      </div>
      
      <div id="collapse{{$tratamiento->id}}" class="panel-collapse collapse" aria-labelledby="{{$tratamiento->id}}" data-parent="#accordionExample">
        <div class= "card-body">
          {{$tratamiento->descripcion}}
          <br>
          <small> Fecha : {{$tratamiento->fecha_diagnostico}}</small>
                    <br>
          <form action="{{route('antecedentes.destroy', $tratamiento->id)}}" method="POST">
            <a class="btn btn-outline-success" href="{{route('antecedentes.edit',$tratamiento->id)}}"> Editar </a>
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el dato{{$tratamiento->nombre}}?')">Eliminar</button>
          </form>
        </div>
      </div>
    @endforeach
  
  </div>
</div>

<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Intervenciones quirúrgicas
      </h4>
    </div>
    @foreach($intervenciones as $intervencion)
      <div class="card-header shadow" id="{{$intervencion->id}}" role="button" data-toggle="collapse" href="#collapse{{$intervencion->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
        <h5 class="panel-title">
          <a>
            {{$intervencion->nombre}}
          </a>
        </h5>
      </div>
    
      <div id="collapse{{$intervencion->id}}" class="panel-collapse collapse" aria-labelledby="{{$intervencion->id}}" data-parent="#accordionExample">
        <div class= "card-body">
          {{$intervencion->descripcion}}
          <br>
          <small> Fecha: {{$intervencion->fecha_diagnostico}}</small>
          <br>
          <form action="{{route('antecedentes.destroy', $intervencion->id)}}" method="POST">
            <a class="btn btn-outline-success" href="{{route('antecedentes.edit',$intervencion->id)}}"> Editar </a>
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el dato{{$intervencion->nombre}}?')">Eliminar</button>
          </form>
        </div>
      </div>
        
    @endforeach
  </div>
</div>
    
</div>
@endsection


