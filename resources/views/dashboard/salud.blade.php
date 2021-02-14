    <header>
        <label class="lnr lnr-menu"></label>
    </header>

    <div class="menu">
        <div class="line"><a href="{{route('inicio')}}" class="fas fa-address-book"><font>Inicio</font></a></div>
        <div class="line"><a href="{{route('diabetes')}}" class="far fa-newspaper"><font>Artículos</font></a></div>
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

        <div class="line"><a href="" class="far fa-address-book"><font>Pacientes</font></a></div>
    </div>



