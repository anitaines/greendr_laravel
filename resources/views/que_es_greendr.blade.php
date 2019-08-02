@extends("layouts.app")

@section("title")
  Qué es GREENDR
@endsection

@section('content')

  <div class="contenedor_boarding">

  <h3 class="h3_boarding">QUÉ ES GREENDR</h3>

  <div class="texto_boarding">
    <p class="p_boarding"> Greendr es una red social para amantes de las plantas.</p>
    <p class="p_boarding">Es un club de jardinería virtual donde podés intercambiar semillas, esquejes, almácigos, herramientas de jardinería e incluso servicios. </p>
    <p class="p_boarding">Subí los productos que quieras intercambiar y conseguí las plantas que estás buscando.</p>
    <p class="p_boarding">Enriquecé tu jardín y el de las otras personas, ¡es gratis!</p>

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
