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


@endsection