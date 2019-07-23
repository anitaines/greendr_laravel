@extends("layouts.app")

@section("title")
  GREENDR - Panel de Control
@endsection

@section('content')

  <div class="contenedor_cpanel">

    <h3 class="h3_cpanel">PANEL DE CONTROL</h3>

    <div class="subir_plantas_cpanel">
    <a href="formulario_subida">
    <button class="subir button_cpanel" type="button">
    SUBIR PLANTA*
    </button>
    </a>
    <p class="p_cpanel"><i>  *Planta, esqueje, semillas,<br> producto o servicio de jardinería. </i></p>
    </div>

    {{-- MIS PLANTAS --}}
    <div class="misplantas_cpanel">

      <div class="preview_items">
        @if  ($articulos && $primerSlide)

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

    @else

    <h5>NO TENÉS PLANTAS SUBIDAS TODAVIA!</h5>

  @endif
  </div>

  <a href="/editar_mis_articulos">
  <button class="button_cpanel" type="button">
      VER TODAS MIS PLANTAS*
  </button>
      </a>
  </div>


{{-- LAS PLANTAS QUE ME LIKEARON --}}
  <div class="likeo_cpanel">

@if (count($likes)>0)
  <div class="preview_likes_items">

    @foreach ($likes as $element)

      <div class="item_likeado_cpanel">
        {{-- usuario que likeo --}}
      <a class="uno item_likeado_cpanel" href="/usuario/{{$element->dameElUser->id}}"><img class="img_likeado_cpanel" src="/storage/avatares/{{$element->dameElUser->avatar}}" alt=""></a>
      <a class="dos item_likeado_cpanel" href="/usuario/{{$element->dameElUser->id}}"><p>{{$element->dameElUser->username}}</p></a>
        {{-- articulo likeado --}}
      <a class="tres item_likeado_cpanel" href="/articulo/{{$element->dameElArticulo->id}}"><img class="img_likeado_cpanel" src="/storage/articulos/{{$element->dameElArticulo->image1}}" alt=""></a>
      <a class="cuatro item_likeado_cpanel" href="/articulo/{{$element->dameElArticulo->id}}"><p>{{$element->dameElArticulo->name}}</p></a>
      </div>
      <hr>

    @endforeach

    </div>
  @else

  <h5>TODAVIA NO TENÉS NINGÚN LIKE :(</h5>

  @endif

    <a href="#">
    <button class="button_cpanel" type="button">
        Quién me likeó?
    </button>
        </a>

  </div>

{{-- MENSAJES PROVISORIO --}}
  <div class="mensajes_cpanel">

  <div class="preview_mensajes_items">

    <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
      <a class="odio onBoarding_a" href="#">
        <img class="photo_mensajes" src="/media/inbox-fake.png" alt="inbox">
      </a>
    </article>

    </div>

    <a href="#">
    <button class="button_cpanel" type="button">
        VER TODOS LOS MENSAJES
    </button>
        </a>

  </div>

{{-- WISHLIST (LAS PLANTAS QUE LIKEE) --}}
  <div class="wishlist_cpanel">

    <div class="preview_items">
    @if (count($articulosLikeados)>0)

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

          <div class="carousel-item active">
              <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
                <a class="odio onBoarding_a" href="/editar_wishlist">
                  <img class="photo onBoarding_photo" src="/media/onboarding/obB.png" alt="planta">
                  <div class="texto onBoarding_texto">
                    <h2 class="onBoarding_h2">LAS PLANTAS QUE QUIERO (WISHLIST)</h2>
                  </div>
                </a>
              </article>
          </div>

          {{-- <div class="carousel-item active">
              <article id="product_cpanel" class="product d-block w-100">
                <a class="odio onBoarding_a" href="/articulo/{{$primerSlide->id}}">
                  <img class="photo" src="/storage/articulos/{{$primerSlide->image1}}" alt="planta">
                  <div class="texto">
                    <h3>{{$primerSlide->categoria->name}}</h3>
                    <h2>{{$primerSlide->name}}</h2>
                  </div>
                </a>
              </article>
          </div> --}}

          @foreach ($articulosLikeados as $key => $valueLikeado)

          <div class="carousel-item">
            <article id="product_cpanel" class="product d-block w-100">
            <a class="odio" href="/articulo/{{$valueLikeado->id}}">
            <img class="photo" src="/storage/articulos/{{$valueLikeado->image1}}" alt="planta">
            <div class="texto">
            <h3>{{$valueLikeado->categoria->name}}</h3>
            <h2>{{$valueLikeado->name}}</h2>
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

      @else

        <h5>TODAVÍA NO LIKEASTE NINGUNA PLANTA!</h5>

      @endif
      </div>

      <a href="/editar_wishlist">
      <button class="button_cpanel" type="button">
      VER TODAS LAS PLANTAS QUE QUIERO
      </button>
      </a>

  </div>

  {{-- MIS DATOS --}}
  <div class="misdatos_cpanel">
    <a href="perfil">
    <button class="perfil_button_cpanel" type="button">
    MIS DATOS
    </button>
    </a>

    <a href="borrar_cuenta">
    <button class="borrar button_cpanel" type="button">
    BORRAR CUENTA
    </button>
    </a>
  </div>

  </div>

@endsection
