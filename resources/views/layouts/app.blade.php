<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'REGISTRO') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/like.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="{{ asset('imagenes/logo_proyecto.png') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Rexistro') }}</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('restaurante.restaurante') }}">Os nosos bares</a>
                            </li>
                    </ul>
                </div>
            </div>
            </div>
        </nav>


        @endif
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('likes') }}">Meus likes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.usuarios') }}"> A comunidade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('restaurante.restaurante') }}">Os nosos bares</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('image.create') }}">Subida de imaxenes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reserva.create') }}">Fai a tua reserva</a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.foto') }}">AVATAR </a>
        </li>

        @include('includes.avatar')

        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <a class="dropdown-item" href="{{ route('perfil', ['id' => Auth::user()->id]) }}">
                    Meus datos
                </a>
                <a class="dropdown-item" href="{{ route('config') }}">
                    Configuración
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </li>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                Administrador <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('restaurante.create') }}">
                    Crear bares
                </a>
                <a class="dropdown-item" href="{{ route('restaurante.listado') }}">
                    Modificar datos bares
                </a>

            </div>
        </li>

    @endguest
    </ul>
    </div>
    </div>
    </nav>

    <main>
        <div>
            @yield('content')


        </div>

    </main>




    </div>
    </div>
    </div>
   <footer id="sticky-footer" class="py-4 bg-light ">
    <div class="container text-center">
    <small>Copyright &copy; obocomer</small>
    </div>
  </footer>  
</body>

</html>
