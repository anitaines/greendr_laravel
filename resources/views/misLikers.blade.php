@extends("layouts.app")

@section("title")
  GREENDR - Mis likers
@endsection

@section('content')

  <div class="contenedor_editarMisArticulos">

  <h3 class="h3_editarMisArticulos">QUIÉN LIKEÓ MIS PLANTAS*:</h3>

  <div class="div_likers">

    <div class="item_likers">
      <p class="unoA item_likers"> USUARIO:</p>
      <p class="dosA item_likers"> LIKEÓ:</p>
    </div>
    <hr>

    @foreach ($likes as $element)

      <div class="item_likers">
        {{-- usuario que likeo --}}
      <a class="uno item_likers" href="/usuario/{{$element->dameElUser->id}}"><img class="img_likeado_cpanel" src="/storage/avatares/{{$element->dameElUser->avatar}}" alt=""></a>
      <a class="dos item_likers" href="/usuario/{{$element->dameElUser->id}}"><p>{{$element->dameElUser->username}}</p></a>
        {{-- articulo likeado --}}
      <a class="tres item_likers" href="/articulo/{{$element->dameElArticulo->id}}"><img class="img_likeado_cpanel" src="/storage/articulos/{{$element->dameElArticulo->image1}}" alt=""></a>
      <a class="cuatro item_likers" href="/articulo/{{$element->dameElArticulo->id}}"><p>{{$element->dameElArticulo->name}}</p></a>
      </div>
      <hr>

    @endforeach

    </div>


  </div>

@endsection
