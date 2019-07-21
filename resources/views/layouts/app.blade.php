<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="keywords" content="Plantas, semillas, esquejes, intercambio, jardineria">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield("title")</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/css/estilos.css">

</head>
<body>


<div class="contenedor_nav">
<!-- LOGOs -->
  <div class="logo">
    <a href="/index">
    <img class="logotipo"src="/media/logos/logoOK.png" alt="logotipo">
    <img class="logotipo2" src="/media/logos/logo-small.png" alt="logotipo2">
    </a>
  </div>

  <nav>

  <!-- BUSCADOR -->

  <div class="buscador_container">
<form class="form_nav" action="/index" method="post">
<input class="input_nav" type="search" name="search" value="">
<button class="button_nav" type="submit"><i class="fa fa-search"></i></button>
</form>
  </div>

<!-- ICONOS -->
  @guest

    <div class="iconos-container">

      <a class="iconos" href="/index"><i class="fas fa-home"></i></a>

      <div class="chip">
        <a href="{{ route('login') }}">
          <i class="fas fa-user"></i>
          LOGIN
        </a>
      </div>

      <div class="dropdown">

        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a class="iconos" href="#"></a>
          <i class="fas fa-bars"></i>
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" type="submit"> <a href="{{ route('login') }}">Iniciar sesión</a></button>
          <button class="dropdown-item" type="button"> <a href="/que_es_greendr">Qué es Greendr</a></button>
          <button class="dropdown-item" type="button"> <a href="#">Recomendaciones</a></button>
          <button class="dropdown-item" type="button"> <a href="/como_funciona">Preguntas frecuentes</a> </button>
          <button class="dropdown-item" type="button"> <a href="#">Contacto</a></button>

        </div>
      </div>

    </div>

    @else

    <div class="iconos-container">

      <a class="iconos" href="/index"><i class="fas fa-home"></i></a>

      <div class="chip">
        <a href="/control_panel">
        <img src="/storage/avatares/{{ Auth::user()->avatar }}" class="avatar" alt="avatar">
        {{ Auth::user()->username }}
        </a>
      </div>

      <div class="dropdown">

        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a class="iconos" href="#"></a>
          <i class="fas fa-bars"></i>
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" type="button"> <a href="/formulario_subida">SUBIR PLANTA*</a> </button>

          <button class="dropdown-item" type="button"> <a href="/control_panel">Mi cuenta</a> </button>

          <button class="dropdown-item" type="button"> <a href="#">Recomendaciones</a></button>

          <button class="dropdown-item" type="button"> <a href="/que_es_como_funciona">Preguntas frecuentes</a></button>

          <button class="dropdown-item" type="button"> <a href="#">Contacto</a></button>

          {{-- <button class="dropdown-item" type="button"> <a href="{{ route('logout') }}">Cerrar sesión</a></button> --}}

          <div class="dropdown-item" aria-labelledby="navbarDropdown">
              <a class="" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  Cerrar sesión
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>

        </div>

      </div>
    </div>

  @endguest
</nav>
</div>

@yield('content')

    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
</body>
</html>
