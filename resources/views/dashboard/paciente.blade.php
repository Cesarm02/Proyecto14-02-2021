    <header>
        <label class="lnr lnr-menu"></label>
    </header>
    <div class="menu">
        <div class="line"><a href="{{route('inicio')}}" class="fas fa-icons"><font>Inicio</font></a></div>
        <div class="line">
            <li>
                <a href="#" class=" submenu-toggle fas fa-id-badge"><font>Perfil</font></a>
                <ul class="nav submenu">
                    <li><small> <a href="{{route('antecedentes.index')}}"> Antecedentes personales </a> </small> </li>
                    <li><small> <a href="{{route('peso.index')}}" class=""> Peso y altura </a> </small></li>
                </ul>
            </li>
        </div>
        <div class="line"><a href="{{route('historial.index')}}" class="fas fa-notes-medical"><font>Historial</font></a></div>
        <div class="line"><a href="{{route('medicamentos.index')}}" class="fas fa-tablets"><font>Medicamentos</font></a></div>
        <div class="line"><a href="{{route('glucometrias.index')}}" class="fas fa-user-clock"><font>Glucometrías</font></a></div>
        <div class="line"><a href="{{route('alimentos.index')}}" class="fas fa-utensils"><font>Alimentos</font></a></div>
        <div class="line"><a href="{{route('ejercicio.index')}}" class="fas fa-dumbbell"><font>Ejercicio</font></a></div>
        <div class="line"><a href="{{route('insulinas.index')}}"  class="fas fa-syringe"><font>Insulinas</font></a></div>

        <div class="line">
            <li>
                <a href="#" class=" submenu-toggle fas fa-comments"><font>Foro</font></a>
                <ul class="nav submenu">
                    <li><small> <a href="{{route('articulo')}}"> General </a> </small> </li>
                    <li><small> <a href="{{route('publicaciones.index')}}"> Mis publicaciones </a> </small> </li>
                    <li><small><a href="{{route('medicamentos')}}"> Medicamentos </a></small>  </li>
                    <li><small><a href="{{route('glucometrias')}}"> Glucometrías </a></small>  </li>
                    <li><small><a href="{{route('ejercicio')}}"> Ejercicio </a> </small> </li>
                    <li><small><a href="{{route('comidas')}}"> Comidas </a> </small> </li>
                </ul>
            </li>
        </div>

        <div class="line"><a href="{{route('diabetes')}}" class="far fa-newspaper"><font>Artículos</font></a></div>
        <div class="line"><a href="{{route('reportes.index')}}" class="fas fa-file"><font>Reportes</font></a></div>
        <div class="line"><a href="{{route('eventos.index')}}" class="fas fa-calendar-alt"><font>Calendario</font></a></div>
    </div>



