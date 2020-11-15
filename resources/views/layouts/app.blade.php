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
    <script src="{{ asset('js/app.js') }}" ></script>
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('imagenes/logo_proyecto.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link" href="">Restaurante</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container" style="width:100%; margin:0; padding:0">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
            <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('imagenes/callos.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/cocido.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('imagenes/raxo.jpg') }}" alt="Third slide">
             </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
        </a>
    </div>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('likes')}}">Meus likes</a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('image.create')}}">Subida de imaxenes</a>
                        </li>
                          <li>
                         
                            @include('includes.avatar')
                         
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{route('perfil',['id'=>Auth::user()->id])}}">
                                   Meu perfil
                                </a>
                                <a class="dropdown-item" href="">
                                   Meus datos
                                </a>
                                <a class="dropdown-item" href="{{route('config')}}">
                                    Configuración
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>


                            </div>
                        </li>
                        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      
        
        <main class="py-4"  style=" top:0; left:0 z-index:1" >
            @yield('content')
        </main>
    </div>
</div>  
</body>

</html>