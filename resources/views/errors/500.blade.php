{{-- @extends('layouts.app') --}}
@extends('errors::layout')
@section('title', '500')

<head>
  <!-- Superstatic default 404 page. Replace this by adding an "error_page" to your superstatic.json -->
  <meta charset=utf-8 />
  <title>Page Not Found</title>
  <style>
    body {
      background: #f5f5f5;
      font-family: Helvetica, Open Sans, sans-serif;
      padding: 0 5%;
    }
    
    #message {
      background: white;
      max-width: 600px;
      text-align: center;
      padding: 1.5em;
      margin: 3em auto 1em;
      border-top: 5px solid #ccc;
      box-shadow: 1px 1px 5px rgba(0,0,0,0.15);
    }
    
    #message h1 {
      color: #666;
      font-weight: normal;
      margin: 0 0 0.25em;
    }
    
    #message p {
      margin: 0;
      color: #444;
    }
    
    #footer {
      font-size: 11px;
      color: #999;
      text-align: center;
      margin: 0 0 4em;
    }
    
    #footer a {
      color: #999;
    }
  </style>
</head>

@section('message')


<html>
<body>
  <div class="container">

    <div id="message">
      <h1>Error 500 Estamos trabajando para solucionarlo <i class="fas fa-exclamation-triangle"></i></h1>
      <p>Lo sentimos, pero la página que esta buscando no se encuentra disponible</p>
    </div>
    <p id="footer">Ir hacia el menú de iconos <a href="{{route('inicio')}}" >Home</a>.</p>
  </div>
  </body>
</html>
@endsection

