@extends("layouts.app")

@section("title")
  Qué es GREENDR
@endsection

@section('content')

  <div class="contenedor_boarding">

  <h3 class="h3_boarding">QUÉ ES GREENDR</h3>

  <div class="texto_boarding">
    <p class="p_boarding"> Greendr es un sitio para intercambiar plantas.</p>
    <p class="p_boarding">Funciona como un club de jardinería pero virtual donde vas a poder intercambiar tus plantas por las plantas que te gusten de otros usuarios</p>
    <p class="p_boarding">Además de plantas, vas a poder intercambiar esquejes, semillas, productos de jardinería - nuevos o usados - e incluso servicios.</p>
    <p class="p_boarding">Sumá especies a tu jardín, gratis.</p>

  </div>

  <div class="links_boarding">

  <a href="/como_funciona">
  <button class="button_boarding" type="button">
  Cómo funciona Greendr
  </button>
  </a>

  <a href="/register">
  <button class="button_boarding" type="button">
  Registrate acá
  </button>
  </a>

  </div>

  </div>

@endsection
