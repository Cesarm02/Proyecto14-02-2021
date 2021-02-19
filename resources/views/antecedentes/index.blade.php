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
            @can('haveaccess', 'ejercicio.create')
                <a class="btn btn-primary float-right" href="{{route('ejercicio.create')}}">Agregar Antecedentes</a>
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
          <small> Fecha : {{$personal->fecha_diagnostico}}</small>
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
      
    <div class="card-header shadow" id="{{$vacuna->id}}" role="button" data-toggle="collapse" href="#collapse{{$vauna->id}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
      <h5 class="panel-title">
        <a>
          {{$vacuna->descripcion}}
        </a>
      </h5>
    </div>
  
    <div id="collapse{{$vauna->id}}" class="panel-collapse collapse" aria-labelledby="{{$vacuna->id}}" data-parent="#accordionExample">
      <div class= "card-body">
        {{$vacuna->descripcion}}
        <br>
        <small> Fecha: {{$vacuna->fecha_diagnostico}}</small>
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
        
      <div class="card-header shadow" id="{{$tratamiento->id}}" role="button" data-toggle="collapse" href="#collapse{{$tratamiento}}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
        <h5 class="panel-title">
          <a>
            {{$tratamiento->nombre}}
          </a>
        </h5>
      </div>
      
      <div id="collapse{{$tratamiento}}" class="panel-collapse collapse" aria-labelledby="{{$tratamiento->id}}" data-parent="#accordionExample">
        <div class= "card-body">
          {{$tratamiento->descripcion}}
          <br>
          <small> Fecha : {{$tratamiento->fecha_diagnostico}}</small>
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
    <div class="card-header shadow" id="headingOne" role="button" data-toggle="collapse" href="#collapseTest" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
      <h5 class="panel-title">
        <a>
          Collapsible Group Item #1
        </a>
      </h5>
    </div>
  
    <div id="collapseTest" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class= "card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
    
</div>
@endsection


