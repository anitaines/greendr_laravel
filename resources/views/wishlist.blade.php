@extends("layouts.app")

@section("title")
  GREENDR - Mis wishlist
@endsection

@section('content')

  <div class="contenedor_editarMisArticulos">

  <h3 class="h3_editarMisArticulos">LAS PLANTAS* QUE QUIERO:</h3>


  <div class="main_editarMisArticulos">

  @foreach ($queLikee as $key => $value)

  <article class="product_editarMisArticulos">

  <a class="odio_editarMisArticulos" href="/articulo/{{$value->dameElArticulo->id}}">
  <img class="photo_editarMisArticulos" src="/storage/articulos/{{$value->dameElArticulo->image1}}" alt="planta">

      <div class="texto_editarMisArticulos">
        <h3 class="h3_texto_editarMisArticulos">{{$value->dameElArticulo->categoria->name}}</h3>

        <h2 class="h2_texto_editarMisArticulos">{{$value->dameElArticulo->name}}</h2>
      </div>

    </a>
  </article>

  @endforeach

  </div>

  </div>

@endsection
