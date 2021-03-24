@extends('layouts.app')

@section('content')
<div class="container">
    
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
      </ol>
    </nav>

<div class="alert alert-info" role="alert">
  <h3> Sección de guia</h3>
</div>
{{-- SECCION DE INICIO SIN LOOGGEO  --}}
    @if(!Auth::user())
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-icons"> </i>Home</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de guia  
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('inicio')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="far fa-newspaper"></i> Artículos</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de Diabetes en general, se encuentra articulos como : ¿Qué es?, Tipos de diabetes, etc.  
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('diabetes')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-book-reader"></i> Manuales</h5>
                <p class="card-text">
                Este icono hace referencia a la sección del manual de usuario, aquí se encuentra detalladamente el uso del aplicativo
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            
        </div>
        <br>
        <br>
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-comments"></i> Foro</h5>
                <p class="card-text">
                Este icono hace referencia a la sección foro, donde los usuarios logeados publican sus articulos en diferentes categorias
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('articulo')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user"></i> Sobre nosotros</h5>
                <p class="card-text">
                Este icono hace referencia a la sección sobre nosotros, donde se encuentra información de las personas encargadas del sistema y de la institución.
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-id-card"></i> Politicas</h5>
                <p class="card-text">
                Este icono hace referencia a la sección las politicas de privacidad de datos, y politicas de uso del sistema
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('politica')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            
        </div>

        {{-- SECCION INICIADA COMO PACIENTE  --}}
    @elseif(Auth()->user()->roles[0]->id == 2)

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-icons"> </i>Home</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de guia  
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('inicio')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-id-badge"></i> Perfil</h5>
                <p class="card-text">
                Este icono hace referencia a la sección del perfil, se encuentra información de antecedentes personales, peso y altura.
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('antecedentes.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-notes-medical"></i> Historial</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de la información del usuario de forma simplificada y exacta
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('historial.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title fas fa-tablets"> Medicamentos</h5>
                <p class="card-text">
                Este icono hace referencia a la sección los medicamentos registrados por el usuario con sus datos de referencia
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('medicamentos.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="card-deck">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user-clock"></i> Glucometrías</h5>
                <p class="card-text">
                Este icono hace referencia a la sección sobre Glucometrías, acá se lleva el control de agregar y revisar las glucometrías registradas por el usuario
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('glucometrias.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title fas fa-utensils"> Alimentos</h5>
                <p class="card-text">
                Este icono hace referencia a la sección la alimentación que lleva el usuario (Tipo de comida, hora, comentarios)
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted "><a href="{{route('alimentos.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
                        <div class="card">
                <div class="card-body">
                <h5 class="card-title fas fa-dumbbell"> Ejercicio</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de registro del ejercicio realizado por el usuario 
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('ejercicio.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
                </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-syringe"></i> Insulinas</h5>
                <p class="card-text">
                Este icono hace referencia a la sección referente a las insulinas utiizadas por el paciente o el registro historico de ellas
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('insulinas.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            
        </div>

        <br>
        <br>
          <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-comments"></i> Foro</h5>
                <p class="card-text">
                Este icono hace referencia a la sección foro, donde los usuarios logeados publican sus articulos en diferentes categorias
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('articulo')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="far fa-newspaper"></i> Artículos</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de Diabetes en general, se encuentra articulos como : ¿Qué es?, Tipos de diabetes, etc.  
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('diabetes')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
  
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-file"></i> Reportes</h5>
                <p class="card-text">
                Este icono hace referencia a la sección referente a los reportes que se pueden generar con los datos alimentados en el sistema
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('reportes.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <h5 class="card-title"> <i class="far fa-clock"></i>Calendario</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de calendario(Registros de eventos) registradas por el usuario
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('eventos.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
        </div>
    @elseif(Auth()->user()->roles[0]->id == 1)
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user"></i> Usuarios</h5>
                <p class="card-text">
                    Este icono hace referencia a la lista de usuarios registrados en el sistema
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('user.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-address-card"></i> Roles</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de los roles que existen en el sistema con sus permisos
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('role.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
  
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-database"></i> Back up</h5>
                <p class="card-text">
                Este icono hace referencia a la generación y recuperación de la base de datos
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('reportes.index')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-comments"></i> Foro</h5>
                <p class="card-text">
                Este icono hace referencia a la sección foro, donde los usuarios logeados publican sus articulos en diferentes categorias
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('articulo')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
                      
        </div>

        <div class="card-deck">


          <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="far fa-newspaper"></i> Artículos</h5>
                <p class="card-text">
                Este icono hace referencia a la sección de Diabetes en general, se encuentra articulos como : ¿Qué es?, Tipos de diabetes, etc.  
                </p>
                </div>
                <div class="card-footer">
                <small class="text-muted"><a href="{{route('diabetes')}}" class="btn btn-primary">Visualizar</a></small>
                </div>
            </div>
        </div>
    @endif

</div>
@endsection