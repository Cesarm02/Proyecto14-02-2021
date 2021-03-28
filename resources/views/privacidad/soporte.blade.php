@extends('layouts.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Soporte</li>
    </ol>
    </nav>
    
    <div class="card">
        <div class="alert alert-info class=card-header" role="alert">
            <h3> Soporte</h3>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">

                <div class="row">
                    
                        <div class="card border-info mb-4" style="max-width: 18rem; margin-right: 25px; margin-left: 25px;">
                            <div class="card-header bg-transparent border-info">Dra. Sandra Castillo</div>
                            <div class="card-body">
                                <h5 class="card-title  text-info">sanpaticas@gmail.com</h5>
                                <p class="card-text">Profesioanl encargado de la asesoría del sistema de información</p>
                            </div>
                            <div class="card-footer bg-transparent border-info">Doctora</div>
                        </div>
                        <div class="card border-info mb-4" style="max-width: 18rem;  margin-right: 25px; margin-left: 25px;">
                            <div class="card-header bg-transparent border-info">Cesar Estiven Mesa Medrano</div>
                            <div class="card-body ">
                                <h5 class="card-title text-info"> cesar-2007-mesa@hotmail.com</h5>
                                <p class="card-text ">Ingeniero encargado del diseño, desarollo e implementación del sistema de informaición</p>
                            </div>
                            <div class="card-footer bg-transparent border-info">Ingeniero de sistemas</div>
                        </div>
                        <div class="card border-info mb-4" style="max-width: 18rem;  margin-right: 25px; margin-left: 25px;">
                            <div class="card-header bg-transparent border-info">Universidad Piloto de Colombia</div>
                            <div class="card-body ">
                                <h5 class="card-title text-info">https://girardot.unipiloto.edu.co/</h5>
                                <p class="card-text">Proyecto realizado como propuesta de grado al Instituto de educación</p>
                            </div>
                            <div class="card-footer bg-transparent border-info">Universidad</div>
                        </div>
                </div>

                <footer class="blockquote-footer">ADMINISTRADOR <cite title="Source Title">Soporte</cite></footer>
            </blockquote>
        </div>
    </div>
</div>
@endsection