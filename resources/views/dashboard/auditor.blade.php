    <header>
        <label class="lnr lnr-menu"></label>
    </header>

    <div class="menu">
        <div class="line"><a href="{{route('inicio')}}" class="fas fa-address-book"><font>Inicio</font></a></div>
        @can('haveaccess', 'user.index')
            <div class="line"><a href="{{route('user.index')}}" class="fas fa-user"><font>Usuarios </font></a></div>
        @endcan
        @can('haveaccess', 'auditoria')
            <div class="line"><a href="{{route('tablas')}}" class="fas fa-table"><font>Tablas</font></a></div>
            <div class="line"><a href="{{route('auditoria')}}" class="far fa-eye"><font>Auditoria</font></a></div>
        @endcan        
        @can('haveaccess', 'antecedentes.index')

            <div class="line">
                <li>
                    <a href="#" class=" submenu-toggle fas fa-id-badge"><font>Perfil</font></a>
                    <ul class="nav submenu">
                        <li><small> <a href="{{route('antecedentes.index')}}"> Antecedentes personales </a> </small> </li>
                    
                        @can('haveaccess', 'pesos.index')
                            <li><small> <a href="{{route('peso.index')}}" class=""> Peso y altura </a> </small></li>
                        @endcan
                    </ul>
                </li>
            </div>
        @endcan
        @can('haveaccess', 'historial.index')
            <div class="line"><a href="{{route('historial.index')}}" class="fas fa-notes-medical"><font>Historial</font></a></div>
        @endcan
        @can('haveaccess', 'medicamentos.index')
            <div class="line"><a href="{{route('medicamentos.index')}}" class="fas fa-tablets"><font>Medicamentos</font></a></div>
        @endcan
        @can('haveaccess', 'glucometrias.index')
            <div class="line"><a href="{{route('glucometrias.index')}}" class="fas fa-user-clock"><font>Glucometrías</font></a></div>
        @endcan
        @can('haveaccess', 'alimentos.index')
            <div class="line"><a href="{{route('alimentos.index')}}" class="fas fa-utensils"><font>Alimentos</font></a></div>
        @endcan
        @can('haveaccess', 'ejercicios.index')
            <div class="line"><a href="{{route('ejercicio.index')}}" class="fas fa-dumbbell"><font>Ejercicio</font></a></div>
        @endcan
            {{-- <div class="line"><a href="{{route('insulinas.index')}}"  class="fas fa-syringe"><font>Insulinas</font></a></div> --}}

        @can('haveaccess', 'articulos.index')

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
        @endcan
        @can('haveaccess', 'reportes.index')
            <div class="line"><a href="{{route('reportes.index')}}" class="fas fa-file"><font>Reportes</font></a></div>
        @endcan
        @can('haveaccess', 'citas.index')
            <div class="line"><a href="{{route('eventos.index')}}" class="fas fa-calendar-alt"><font>Calendario</font></a></div>
        @endcan
    </div>



