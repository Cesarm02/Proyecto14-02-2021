@extends('layouts.app')
   <head>
    <link rel="stylesheet" href="css/collapse.css">     
  </head>

@section('content')
<div class="container">
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Historial</li>
        </ol>
    </nav>
    <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Historial </strong> 
        </h3>
    </div>
@include('personalizar.mensaje')

<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Peso y altura
      </h4>
    </div>
      <div class="card-header shadow" id="peso" role="button" data-toggle="collapse" href="#collapsepeso" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
        <h5 class="panel-title">
          <a>
            Registro de pesos y alturas
          </a>
        </h5>
      </div>
    
      <div id="collapsepeso" class="panel-collapse collapse" aria-labelledby="peso" data-parent="#accordionExample">
        <div class= "card-body">
          <table  style="text-align:center;"  class="table  table-striped table-bordered table-responsive">
        <thead>
            <th> Fecha</th>
            <th> Peso</th>
            <th> Altura</th>
            <th> IMC </th>
            <th> Comentario</th>
        </thead>
        <tbody>
            @foreach($pesos as $peso)
            <tr>
                <td> {{$peso->fecha}}</td>
                <td> {{$peso->peso}}</td>
                <td> {{$peso->altura}}</td>
                <td> {{$peso->imc}}</td>
                <td> {{$peso->comentario}}</td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
        </div>
      </div>
  </div>
</div>

<div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
  <div class="card" style="border-radius: 10px;">
    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
      <h4 class="mb-0">
        Medicamentos
      </h4>
    </div>
      <div class="card-header shadow" id="medicamentos" role="button" data-toggle="collapse" href="#collapsemedicamentos" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
        <h5 class="panel-title">
          <a>
            Registro de medicamentos
          </a>
        </h5>
      </div>
    
      <div id="collapsemedicamentos" class="panel-collapse collapse" aria-labelledby="medicamentos" data-parent="#accordionExample">
        <div class= "card-body">
          <table  style="text-align:center"  class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Administracion</th>
                <th>Horario</th>
                <th>Estado</th>

            </tr>
        </thead>
        <tbody>
            @foreach($medicamentos as $medicamento)
            <tr>
                <td> {{$medicamento->id}}</td>
                <td> {{$medicamento->nombre}}</td>
                <td> {{$medicamento->cantidad}}</td>
                <td> {{$medicamento->administracion}}</td>
                <td> {{$medicamento->horario}} horas</td>
                <td> {{$medicamento->estado}}</td>

            </tr>
            @endforeach
        </tbody>
        
    </table>
        </div>
      </div>
  </div>
</div>

</div>

@endsection