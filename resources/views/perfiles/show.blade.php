@extends('layouts.app')

@section('content')

<script src="{{ asset('js/perfil.js') }}"></script>
<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">

    <div class="contenedor container">
        <div class="page">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ URL::to('/') }}/storage/{{ $perfil->foto }}" class="img-responsive" alt="Profile Picture">
                </div>

                <div class="col-md-7">
                    <h1 class="text-center"> {{$perfil->users->name}} {{$perfil->apellidos}} <br> <small> {{$perfil->profesion}} </small> </h1>
                </div>
            </div>

            <!-- main body -->
            <div class="row">
            <div class="col-md-7 vertical">
                <div id="intro">
                    <h3> ANTECEDENTES PERSONALES </h3>

                    @foreach($antecedentes as $antecedente)
                    
                        <h3> <strong>Tipo : {{$antecedente->tipo}}</strong></h3>
                        <h5> <small> Fecha diagnostico : {{$antecedente->fecha_diagnostico}}</small></h5>
                        <p> {{$antecedente->descripcion}}</p>
                    @endforeach

                </div>

                <div id="exp">
                    <h3> EXPERIENCE </h3>
                    <h5><strong> Head: ICT UNIT, NYSC Oyo State, Editorial CDS </strong> <br/> <small> October 2016 – May 2017 </small></h5>

                    <p>I was in charge of outgoing and incoming mails, all available social media platforms, sorting, editing, organising of the Current year’s corp members photo album that goes into the annual OYO KOPA magazine and any other IT related issue.</p>

                    <h5><strong> Freelance Web Developer </strong> <br/> <small> October 2015 – May 2016 </small></h5>
                    <p> I developed websites with html and css (bootstrap framwork), while still developing most of my skills. Check my projects section to view some of my work. </p>

                    <h5><strong> Student Intern </strong> <br/> <small> August 2013 – November 2013 </small></h5>
                    <p>Internship program for 3 months at Emiserve Technologies where I worked as part of a project team and was assigned the role of project writer and interface editor in the development of an attendance management system software for schools while
                        learning and acquiring experience in project execution and documentation.</p>

                </div>
                
            </div>
            <div class="col-md-5">
                
                <div id="dets">
                    <h5> Telefono: <small> {{$perfil->celular}}  </small> </h5>
                    <h5> Email: <small> {{$perfil->users->email}} </small> </h5>
                    
                    {{-- EL PESO ESTA FALLLADNO --}}
                    @foreach($peso as $uno)
                        
                     <h5> Peso: <small> {{$uno->peso}} </small>, Altura: <small>{{$uno->altura}} </small> </h5>
                    @endforeach
                
                
                
                </div>

                <div id="socials">
                    <h3> ACUDIENTES </h3>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Parentesco</th>
                            <th scope="col">Celular</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($acudiente as $acud)
                                <tr>
                                    <th >{{$acud->nombres}}</th>
                                    <td>{{$acud->apellidos}}</td>
                                    <td>{{$acud->parentesco}}</td>
                                    <td>{{$acud->celular}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="edu">
                    <h3> Medicamentos </h3>
                    @foreach($medicamentos as $medicamento)
                    <p>
                        <strong> {{$medicamento->nombre}} </strong> 
                        <small> {{$medicamento->cantidad}} </small><br>
                        <small> Via:  {{$medicamento->administracion}} , </small>
                        <small> Horario:  {{$medicamento->horario}} </small>
                    </p>
                    @endforeach
                        {{$medicamentos->links()}}
                    <br><br>


                <div id="ref">
                <h3> Insulinas </h3>
                    @foreach($insulinas as $insulina)
                    <div class="card border-secondary mb-2" style="max-width: 18rem;">
                        <div class="card-header">Nombre: {{$insulina->nombre}}</div>
                        <div class="card-body text-secondary">
                            <p class="card-text">
                                Fecha: {{$insulina->fecha}} ,
                                Cantidad: {{$insulina->cantidad}},
                                Tipo : {{$insulina->tipo}},
                                Estado : {{$insulina->estado}},
                                Comentarios : {{$insulina->comentarios}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
    </div>
@endsection
