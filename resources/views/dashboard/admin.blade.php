    <header>
        <label class="lnr lnr-menu"></label>
    </header>

    <div class="menu">
        <div class="line"><a href="{{route('inicio')}}" class="fas fa-address-book"><font>Inicio</font></a></div>
        @can('haveaccess', 'user.index')
            <div class="line"><a href="{{route('user.index')}}" class="fas fa-user"><font>Usuarios </font></a></div>
       
        @endcan
        
        @can('haveaccess', 'role.index')
            <div class="line"><a href="{{route('role.index')}}" class="fas fa-address-card"><font>Roles  </font></a></div>
       
        @endcan

        <div class="line"><a href="" class="fas fa-database"><font>Back up</font></a></div>
        
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


    </div>



