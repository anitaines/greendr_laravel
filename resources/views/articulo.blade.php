@extends("layouts.app")

@section("title")
  GREENDR - {{$articulo->name}}
@endsection

@section('content')

  <div class="contenedor_articulo">

  <h3 class="h3_articulo">{{$articulo->name}}</h3>

  <div class="show_plantas">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        @isset($articulo->image2)
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        @endisset
        @isset($articulo->image3)
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        @endisset
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="img_articulo" src="/storage/articulos/{{$articulo->image1}}" class="d-block w-100" alt="imagen1">
        </div>

        @isset($articulo->image2)
          <div class="carousel-item">
            <img class="img_articulo" src="/storage/articulos/{{$articulo->image2}}" class="d-block w-100" alt="imagen2">
          </div>
        @endisset

        @isset($articulo->image3)
          <div class="carousel-item">
            <img class="img_articulo" src="/storage/articulos/{{$articulo->image3}}" class="d-block w-100" alt="imagen3">
          </div>
        @endisset
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

    <div class="items_button2_articulo">
      @foreach ($likes as $element)

      @if (Auth::User()->username == $articulo->usuario->username)
        <button class="button_articulo" type="button">
        <a class="a_button_articulo" href="/editar_articulo/{{$articulo->id}}">EDITAR PLANTA</a>
        </button>
        @break

      @elseif ($element->user_likeador_id == Auth::User()->id && $element->article_id == $articulo->id)
    <button class="button_articulo" type="button" name="button">
    <a class="a_button_articulo" href="/eliminar_like/{{$articulo->id}}" ><i class="fas fa-heart esperando"></i>ESPERANDO MATCH</a>
    </button>
      @break

    {{-- @elseif ($element->user_likeador_id != Auth::User()->id && $element->article_id != $articulo->id) --}}
    @elseif($loop->last)
      {{-- <button class="button_articulo" type="button" name="button">
      <a href="#">ME INTERESA</a>
      </button> --}}
      <form class="" action="/articulo/{{$articulo->id}}" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{$articulo->id}}">
        <input type="hidden" name="user_likeador_id" value="{{Auth::User()->id}}">
        <button class="button_articulo" type="submit"><i class="fas fa-heart"></i>QUIERO ESTA PLANTA</button>
      </form>

      @endif
    @endforeach
    </div>

  </div>



  <div class="contenedor_items_articulo">


  <div class="items_articulo">
    <h4 class="h4_articulo">Nombre científico:</h4>
    <p class="p_articulo">{{$articulo->nomenclature}}</p>
  </div>

  <div class="items_articulo">
    <h4 class="h4_articulo">Categoría:</h4>
    <p class="p_articulo">{{$articulo->categoria->name}}</p>
  </div>

  <div class="items_articulo">
    <h4 class="h4_articulo">Descripción:</h4>
    @foreach ($descripcion as $key => $value)
      <p class="p_articulo">{{$value}}</p>
    @endforeach
  </div>

  <div class="items_articulo">
    <h4 class="h4_articulo">Punto de intercambio:</h4>
    <p class="p_articulo">{{$articulo->point_id}}</p>
  </div>

  <div class="items_articulo">
      <h4 class="h4_articulo">Usuario:</h4>
      @if (Auth::User()->username == $articulo->usuario->username)
        <a class="a_articulo" href="/editar_mis_articulos">
        <img class="avatar_articulo" src="/storage/avatares/{{$articulo->usuario->avatar}}" alt="avatar">
        <p class="p_usuario_articulo">{{$articulo->usuario->username}}</p>
        </a>
      @else
        <a class="a_articulo" href="/usuario/{{$articulo->usuario->id}}">
          <img class="avatar_articulo" src="/storage/avatares/{{$articulo->usuario->avatar}}" alt="avatar">
          <p class="p_usuario_articulo">{{$articulo->usuario->username}}</p>
        </a>
      @endif
  </div>

  </div>

  <div class="items_button1_articulo">
    {{-- @if (Auth::User()->username == $articulo->usuario->username)
      <button class="button_articulo" type="button">
      <a href="/editar_articulo/{{$articulo->id}}">EDITAR PLANTA</a>
      </button>
      @else
      <button class="button_articulo" type="button" name="button">
      <a href="#">ME INTERESA</a>
      </button>
    @endif --}}
    @foreach ($likes as $element)

    @if (Auth::User()->username == $articulo->usuario->username)
      <button class="button_articulo" type="button">
      <a class="a_button_articulo" href="/editar_articulo/{{$articulo->id}}">EDITAR PLANTA</a>
      </button>
      @break

    @elseif ($element->user_likeador_id == Auth::User()->id && $element->article_id == $articulo->id)
      <button class="button_articulo" type="button" name="button">
      <a class="a_button_articulo" href="/eliminar_like/{{$articulo->id}}" ><i class="fas fa-heart esperando"></i>ESPERANDO MATCH</a>
      </button>
    @break

  {{-- @elseif ($element->user_likeador_id != Auth::User()->id && $element->article_id != $articulo->id) --}}
  @elseif($loop->last)
    {{-- <button class="button_articulo" type="button" name="button">
    <a href="#">ME INTERESA</a>
    </button> --}}
    <form class="" action="/articulo/{{$articulo->id}}" method="post">
      @csrf
      <input type="hidden" name="article_id" value="{{$articulo->id}}">
      <input type="hidden" name="user_likeador_id" value="{{Auth::User()->id}}">
      <button class="button_articulo" type="submit"><i class="fas fa-heart"></i>QUIERO ESTA PLANTA</button>
    </form>

    @endif
  @endforeach
  </div>

  </div>

      <!-- <a href="index.php">VOLVER</a> -->

@endsection
