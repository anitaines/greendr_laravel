@extends("layouts.app")

@section("title")
  GREENDR - Panel de Control
@endsection

@section('content')

  <div class="contenedor_cpanel">

    <h3 class="h3_cpanel">PANEL DE CONTROL</h3>

    <div class="top_contenedor">

    <div class="subir_plantas_cpanel">
    <a href="formulario_subida">
    <button class="subir button_cpanel" type="button">
    SUBIR PLANTA*
    </button>
    </a>
    <p class="p_cpanel"><i>  *Planta, esqueje, semillas,<br> producto o servicio de jardinería. </i></p>
    </div>
    {{-- MIS DATOS --}}
    <div class="misdatos_cpanel_arriba">
      <a href="perfil">
      <button class="perfil_button_cpanel" type="button">
      MIS DATOS
      </button>
      </a>
      </div>

    </div>

    {{-- MIS PLANTAS --}}
    <div class="misplantas_cpanel">

      <div class="preview_items">
        @if  ($articulos && $primerSlide)

          <div id="misArticulos" class="carousel slide" data-ride="carousel">

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

      <a class="carousel-control-prev" href="#misArticulos" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#misArticulos" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>


    </div>

    @else

    {{-- <h5>NO TENÉS PLANTAS SUBIDAS TODAVIA!</h5> --}}
    <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
      <a class="odio onBoarding_a" href="/editar_mis_articulos">
        <img class="photo onBoarding_photo" src="/media/onboarding/obB.png" alt="planta">
        <div class="texto onBoarding_texto">
          <h2 class="onBoarding_h2">NO TENÉS PLANTAS SUBIDAS TODAVIA!</h2>
        </div>
      </a>
    </article>

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

  {{-- <h5>TODAVIA NO TENÉS NINGÚN LIKE :(</h5> --}}
  <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
    <a class="odio onBoarding_a" href="/mis_likers">
      <img class="photo onBoarding_photo" src="/media/onboarding/obA.png" alt="planta">
      <div class="texto onBoarding_texto">
        <h2 class="onBoarding_h2">TODAVIA NO TENÉS NINGÚN LIKE</h2>
      </div>
    </a>
  </article>

  @endif

    <a href="/mis_likers">
    <button class="button_cpanel" type="button">
        ¿QUIÉN ME LIKEÓ?
    </button>
        </a>

  </div>

{{-- MENSAJES PROVISORIO --}}
  <div class="mensajes_cpanel">

  {{-- <div class="preview_mensajes_items"> --}}

    {{-- <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
      <a class="odio onBoarding_a" href="#">
        <img class="photo_mensajes" src="/media/inbox-fake.png" alt="inbox">
      </a>
    </article> --}}

    {{-- <h5>ESTOS SON TUS MATCHS PENDIENTES</h5>
    <ul>
    @foreach ($arrayMatch as $key => $value)
      <li>{{$value}}</li>
    @endforeach
    </ul> --}}


    @if (count($matchFinal)>0)
      <div class="preview_matchs_items">


        {{-- "user1" => objeto user, //quien subió
        "articulo2" => [], array de objetos article //el articulo que quiero
        "userYo2" => $objeto user, //quién likeó o sea yo que estoy logueada
        "articuloWished1" => objeto article //el artículo likeado por user1 --}}
        @for ($i = 0; $i < count($matchFinal); $i++)
          @foreach ($matchFinal[$i]["articulo2"] as $element)


            <div class="item_matcheado_cpanel">
            {{-- articulo wished 1 --}}
            <p class="unoArt item_matcheado_cpanel">TIENE</p>
            <i class="dosArt fas fa-long-arrow-alt-right"></i>
            <a class="tresArt item_matcheado_cpanel" href="/articulo/{{$matchFinal[$i]["articuloWished1"]->id}}"><img class="img_matcheado_cpanel" src="/storage/articulos/{{$matchFinal[$i]["articuloWished1"]->image1}}" alt=""></a>
            <i class="cuatroArt fas fa-long-arrow-alt-left"></i>
            <p class="cincoArt item_matcheado_cpanel">QUIERE</p>
            </div>



            <div class="item_matcheado_cpanel">
              {{-- user 1 --}}
              {{-- <div class="user1"> --}}
              <a class="dosUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["user1"]->id}}"><p>{{$matchFinal[$i]["user1"]->username}}</p></a>
              <a class="unoUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["user1"]->id}}"><img class="img_matcheado_cpanel" src="/storage/avatares/{{$matchFinal[$i]["user1"]->avatar}}" alt=""></a>
              {{-- </div> --}}
              {{-- intercambio --}}

              <button class="intercambio_button" type="button">
              <i class="fas fa-exchange-alt"></i>
              </button>


              {{-- user 2 --}}
              {{-- <div class="user2"> --}}
              <a class="tresUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["userYo2"]->id}}"><img class="img_matcheado_cpanel" src="/storage/avatares/{{$matchFinal[$i]["userYo2"]->avatar}}" alt=""></a>
              <a class="cuatroUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["userYo2"]->id}}"><p>{{$matchFinal[$i]["userYo2"]->username}}</p></a>
              {{-- </div> --}}
            </div>



            <div class="item_matcheado_cpanel">
            {{-- articulo 2 --}}
            <p class="unoArt item_matcheado_cpanel">QUIERE</p>
            <i class="dosArt fas fa-long-arrow-alt-right"></i>
            <a class="tresArt item_matcheado_cpanel" href="/articulo/{{$element->id}}"><img class="img_likeado_cpanel" src="/storage/articulos/{{$element->image1}}" alt=""></a>
            <i class="cuatroArt fas fa-long-arrow-alt-left"></i>
            <p class="cincoArt item_matcheado_cpanel">TIENE</p>
            </div>

            <hr>
            @endforeach
        @endfor

        </div>
      @else

      {{-- <h5>TODAVIA NO TENÉS NINGÚN MATCH :(</h5> --}}
      <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
        <a class="odio onBoarding_a" href="/matches">
          <img class="photo onBoarding_photo" src="/media/onboarding/obA.png" alt="planta">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">TODAVIA NO TENÉS NINGÚN MATCH</h2>
          </div>
        </a>
      </article>

      @endif

    {{-- </div> --}}

    <a href="/matches">
    <button class="button_cpanel" type="button">
        {{-- VER TODOS LOS MENSAJES --}}
        MATCHS PENDIENTES DE CONFIRMACIÓN
    </button>
        </a>

  </div>

{{-- WISHLIST (LAS PLANTAS QUE LIKEE) --}}
  <div class="wishlist_cpanel">
{{-- @dd($articulosLikeados, $primerSlideWishlist) --}}
    <div class="preview_items">
    {{-- @if (count($articulosLikeados)>0) --}}
    {{-- @if ($articulosLikeados && $primerSlideWishlist) --}}
        @if ($primerSlideQueLikee)

      <div id="wishlist" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

          <div class="carousel-item active">
              <article id="product_cpanel" class="product_wishlist d-block w-100">
                {{-- <a class="odio" href="/articulo/{{$primerSlideWishlist->id}}"> --}}
                  <a class="odio" href="/articulo/{{$primerSlideQueLikee->dameElArticulo->id}}">

                  <div class="texto_wishlist">
                    {{-- <h3>{{$primerSlideWishlist->categoria->name}}</h3> --}}
                      <h3>{{$primerSlideQueLikee->dameElArticulo->categoria->name}}</h3>
                      {{-- <h2>{{$primerSlideWishlist->name}}</h2> --}}
                    <h2>{{$primerSlideQueLikee->dameElArticulo->name}}</h2>
                  </div>
                  {{-- <img class="photo_wishlist" src="/storage/articulos/{{$primerSlideWishlist->image1}}" alt="planta"> --}}
                  <img class="photo_wishlist" src="/storage/articulos/{{$primerSlideQueLikee->dameElArticulo->image1}}" alt="planta">
                </a>
              </article>
          </div>

          @foreach ($queLikee as $key => $valueLikeado)

          <div class="carousel-item">
            <article id="product_cpanel" class="product_wishlist d-block w-100">
            <a class="odio" href="/articulo/{{$valueLikeado->dameElArticulo->id}}">

            <div class="texto_wishlist">
            <h3>{{$valueLikeado->dameElArticulo->categoria->name}}</h3>
            <h2>{{$valueLikeado->dameElArticulo->name}}</h2>
            </div>
            <img class="photo_wishlist" src="/storage/articulos/{{$valueLikeado->dameElArticulo->image1}}" alt="planta">
            </a>
            </article>
          </div>

          @endforeach

        </div>

        <a class="carousel-control-prev" href="#wishlist" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#wishlist" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      @else

        {{-- <h5>TODAVÍA NO LIKEASTE NINGUNA PLANTA!</h5> --}}
        <article id="product_cpanel" class="product onBoarding mobile d-block w-100">
          <a class="odio onBoarding_a" href="/wishlist">
            <img class="photo onBoarding_photo" src="/media/onboarding/obC.png" alt="planta">
            <div class="texto onBoarding_texto">
              <h2 class="onBoarding_h2">TODAVÍA NO LIKEASTE NINGUNA PLANTA</h2>
            </div>
          </a>
        </article>

      @endif
      </div>

      <a href="/wishlist">
      <button class="button_cpanel" type="button">
      VER TODAS LAS PLANTAS QUE QUIERO
      </button>
      </a>

  </div>

  {{-- MIS DATOS --}}
  {{-- <div class="misdatos_cpanel"> --}}
    {{-- <a href="perfil">
    <button class="perfil_button_cpanel" type="button">
    MIS DATOS
    </button>
    </a> --}}

    {{-- <a href="borrar_cuenta">
    <button class="borrar button_cpanel" type="button">
    BORRAR CUENTA
    </button>
    </a> --}}
  {{-- </div> --}}

  </div>

@endsection
