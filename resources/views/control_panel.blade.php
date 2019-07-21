@extends("layouts.app")

@section("title")
  GREENDR - Panel de Control
@endsection

@section('content')

  <div class="contenedor_cpanel">

  <h3 class="h3_cpanel">PANEL DE CONTROL</h3>


  <!-- <div class="plantas_cpanel"> -->

  <div class="subir_plantas_cpanel">
  <a href="formulario_subida">
  <button class="subir button_cpanel" type="button">
  SUBIR PLANTA*
  </button>
  </a>
  <p class="p_cpanel"><i>  *Planta, esqueje, semillas,<br> producto o servicio de jardinería. </i></p>
  </div>

  <div class="misplantas_cpanel">

  <!-- <h2 class="h2_cpanel">MIS PLANTAS</h2> -->

  <div class="preview_items">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


      <div class="carousel-inner">

        {{-- <div class="carousel-item active">
            <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
              <a class="odio onBoarding_a" href="/editar_mis_articulos">
                <img class="photo onBoarding_photo" src="/media/onboarding/obB.png" alt="planta">
                <div class="texto onBoarding_texto">
                  <h2 class="onBoarding_h2">MIS PLANTAS</h2>
                </div>
              </a>
            </article>
        </div> --}}

        <div class="carousel-item active">
            <article id="product_cpanel" class="product d-block w-100">
              <a class="odio onBoarding_a" href="/articulo/{{$primerSlide->id}}">
                <img class="photo" src="/storage/articulos/{{$primerSlide->image1}}" alt="planta">
                <div class="texto">
                  <h3>{{$primerSlide->categoria->name}}</h3>
                  <h2>{{$primerSlide->name}}</h2>
                </div>
              </a>
            </article>
        </div>


        @foreach ($articulos as $key => $value)

        <div class="carousel-item">
          <article id="product_cpanel" class="product d-block w-100">
          <a class="odio" href="/articulo/{{$value->id}}">
          <img class="photo" src="/storage/articulos/{{$value->image1}}" alt="planta">
          <div class="texto">
          <h3>{{$value->categoria->name}}</h3>
          <h2>{{$value->name}}</h2>
          </div>
          </a>
          </article>
        </div>

        @endforeach

      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <a href="/editar_mis_articulos">
  <button class="button_cpanel" type="button">
      VER TODAS MIS PLANTAS*
  </button>
      </a>
  </div>

  <!-- </div> plantas_cpanel -->

  <!-- </div> -->

  <div class="mensajes_cpanel">

  <!-- <h2 class="h2_cpanel">MENSAJES</h2> -->

  <div class="preview_mensajes_items">

    <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
      <a class="odio onBoarding_a" href="#">
        <img class="photo_mensajes" src="/media/inbox-fake.png" alt="inbox">
        <!-- <div class="texto onBoarding_texto">
          <h2 class="onBoarding_h2">MENSAJES - PROVISORIO</h2>
        </div> -->
      </a>
    </article>

    </div>

    <a href="#">
    <button class="button_cpanel" type="button">
        VER TODOS LOS MENSAJES
    </button>
        </a>

  </div>


  <div class="wishlist_cpanel">

  <!-- <h2 class="h2_cpanel">LAS PLANTAS QUE QUIERO</h2> -->

    <div class="preview_items">

      <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
        <a class="odio onBoarding_a" href="#">
          <img class="photo onBoarding_photo" src="/media/onboarding/obC.png" alt="obC">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">LAS PLANTAS* QUE QUIERO - PROVISORIO </h2>
          </div>
        </a>
      </article>

      </div>

        <a href="editar_articulos_guardados.php">
        <button class="button_cpanel" type="button">
        VER TODAS LAS PLANTAS QUE QUIERO
        </button>
        </a>

  </div>

  <div class="misdatos_cpanel">

    <a href="perfil">
    <button class="perfil_button_cpanel" type="button">
    MIS DATOS
    </button>
    </a>

  <!-- </div>

  <div class="misdatos_cpanel"> -->

    <a href="borrar_cuenta">
    <button class="borrar button_cpanel" type="button">
    BORRAR CUENTA
    </button>
    </a>

  </div>

  </div>

@endsection
