<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/responsive.js') }}" defer></script>

    {{-- FONTAWESOME --}}
    <script src="https://kit.fontawesome.com/46ae3c7c48.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">


    @yield('scripts')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('inicio')}}" style="text-indent:40px;" >
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                
                    {{-- @can('haveaccess', 'role.index')
                        <li class="nav-item"><a href="{{route('role.index')}}" class="nav-link"> Roles </a> </li>
                    @endcan --}}
                    
                    {{-- @can('haveaccess', 'user.index')
                        <li class="nav-item"><a href="{{route('user.index')}}" class="nav-link"> Usuarios </a> </li>
                    @endcan --}}

                        {{-- <li class="nav-item"><a href="{{route('diabetes')}}" class="nav-link"> Diabetes </a> </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        {{-- <li class="nav-item"><a href="{{route('articulo')}}" class="nav-link"> Articulos </a> </li> --}}
                        {{-- <li class="nav-item"><a href="{{route('articulo')}}" class="nav-link"> Articulos </a> </li> --}}

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href=""> Mi perfil</a>
                                    
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
            
                @if(!Auth::user())
                    @include('dashboard.home')
                    <!-- DASHBOARD ADMIN-->
                @elseif(Auth()->user()->roles[0]->id == 1)
                    @include('dashboard.admin')
                    <!-- DASHBOARD PACIENTE-->
                @elseif(Auth()->user()->roles[0]->id == 2)
                    @include('dashboard.paciente')
                    <!-- DASHBOARD SALUD-->
                @elseif(Auth()->user()->roles[0]->id == 3)
                    @include('dashboard.salud')
                @endif
    </div>
</body>
</html>
