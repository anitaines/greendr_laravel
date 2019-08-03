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

<form class="form_nav" action="/resultados" method="get">
  {{-- @csrf --}}
<input class="input_nav" type="search" name="search" value="" autocomplete="off">

<button class="button_nav" type="submit"><i class="fa fa-search"></i></button>

</form>

<div class="" id="articles">

</div>

  </div>

<!-- ICONOS -->
  @guest

    <div class="iconos-container">

      {{-- <a class="iconos" href="/index"><i class="fas fa-home"></i></a> --}}

      <div class="chip">
        <a href="{{ route('register') }}">
          REGISTRO
        </a>
        </div>


        <div class="chip chiplog">
          <img src="/media/logos/cosita_green.png" alt="" width="22px">
        </div>

        <div class="chip chiplog">
        <a href="{{ route('login') }}">
          {{-- <i class="fas fa-user"></i> --}}
          LOGIN
        </a>
      </div>

      <div class="dropdown">

        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a class="iconos" href="#"></a>
          <i class="fas fa-bars"></i>
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" type="button"> <a href="/index">Home</a></button>
          <button class="dropdown-item" type="submit"> <a href="{{ route('login') }}">Iniciar sesión</a></button>
          <button class="dropdown-item" type="submit"> <a href="{{ route('register') }}">Registro</a></button>
          <button class="dropdown-item" type="button"> <a href="/que_es_greendr">Qué es Greendr</a></button>
          {{-- <button class="dropdown-item" type="button"> <a href="#">Recomendaciones</a></button> --}}
          <button class="dropdown-item" type="button"> <a href="/como_funciona">Preguntas frecuentes</a> </button>
          {{-- <button class="dropdown-item" type="button"> <a href="#">Contacto</a></button> --}}

        </div>
      </div>

    </div>

    @else

    <div class="iconos-container">

      {{-- <a class="iconos" href="/index"><i class="fas fa-home"></i></a> --}}

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
          <button class="dropdown-item" type="button"> <a href="/index">Home</a></button>
          <button class="dropdown-item" type="button"> <a href="/formulario_subida">SUBIR PLANTA*</a> </button>
          <button class="dropdown-item" type="button"> <a href="/control_panel">Mi cuenta</a> </button>
          {{-- <button class="dropdown-item" type="button"> <a href="#">Recomendaciones</a></button> --}}
          <button class="dropdown-item" type="button"> <a href="/que_es_como_funciona">Preguntas frecuentes</a></button>
          {{-- <button class="dropdown-item" type="button"> <a href="#">Contacto</a></button> --}}

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

<!-- Scripts -->
<script src="{{ asset('js/search_bar.js') }}"></script>

</body>
</html>
