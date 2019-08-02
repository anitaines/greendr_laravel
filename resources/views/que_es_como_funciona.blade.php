@extends("layouts.app")

@section("title")
  GREENDR - Qué es y cómo funciona
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

  <h3 class="h3_boarding">CÓMO FUNCIONA GREENDR</h3>

  <div class="texto_boarding">
    <p class="p_boarding">Una vez que te registres con tu usuario y contraseña vas a poder empezar a nutrir tu jardín: podés subir las plantas, semillas, esquejes, productos de jardinería y herramientas que quieras intercambiar, con fotos y descripciones.</p>
    <p class="p_boarding">También vas a poder navegar y encontrar productos que estés buscando. Clickeando sobre el producto vas a poder conocer los detalles y darle like para hacerle saber a su dueño/a que te interesa hacer un intercambio. </p>
    <p class="p_boarding">Si al otro usuario le interesa algún producto tuyo, ¡tienen un match! Solo es cuestión de acordar un punto de encuentro y hacer el intercambio.</p>
    <p class="p_boarding">En la sección recomendaciones vas a encontrar información y consejos de cuidado de plantas, recomendaciones de seguridad para los intercambios y muchos datos interesantes para el cuidado de tu jardín.</p>
    <p class="p_boarding"> ¡Recorré el jardín virtual!</p>
  

  </div>

@guest
  <div class="links_boarding">
  <a href="/register">
  <button class="button_boarding" type="button">
  Registrate acá
  </button>
  </a>
  </div>
  @endguest

  </div>

@endsection
