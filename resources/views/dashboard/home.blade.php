    <header>
        <label class="lnr lnr-menu"></label>
    </header>

    <div class="menu">        
        <div class="line"><a href="{{route('inicio')}}" class="fas fa-icons"><font>Inicio</font></a></div>
        <div class="line"><a href="{{route('diabetes')}}" class="far fa-newspaper"><font>Artículos</font></a></div>
        <div class="line"><a href="{{route('manuales')}}" class="fas fa-book-reader"><font>Manuales</font></a></div>
        <div class="line">
            <li>
                <a href="#" class=" submenu-toggle fas fa-comments"><font>Foro</font></a>
                <ul class="nav submenu">
                    <li><small> <a href="{{route('articulo')}}"> General </a> </small> </li>
                    <li><small><a href="{{route('medicamentos')}}"> Medicamentos </a></small>  </li>
                    <li><small><a href="{{route('glucometrias')}}"> Glucometrías </a></small>  </li>
                    <li><small><a href="{{route('ejercicio')}}"> Ejercicio </a> </small> </li>
                    <li><small><a href="{{route('comidas')}}"> Comidas </a> </small> </li>
                </ul>
            </li>
        </div>
        <div class="line"><a href="{{route('soporte')}}" class="fas fa-user"><font>Soporte</font></a></div>
        <div class="line"><a href="{{route('politica')}}" class="fas fa-book-reader"><font>Politicas</font></a></div>

    </div>



