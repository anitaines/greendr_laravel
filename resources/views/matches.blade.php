@extends("layouts.app")

@section("title")
  GREENDR - Mis likers
@endsection

@section('content')

  <div class="contenedor_editarMisArticulos">

  <h3 class="h3_editarMisArticulos">QUIÉN LIKEÓ MIS PLANTAS*:</h3>

  <div class="div_likers">

    {{-- "user1" => objeto user, //quien subió
    "articulo2" => [], array de objetos article //el articulo que quiero
    "userYo2" => $objeto user, //quién likeó o sea yo que estoy logueada
    "articuloWished1" => objeto article //el artículo likeado por user1 --}}
    @for ($i = 0; $i < count($matchFinal); $i++)
      @foreach ($matchFinal[$i]["articulo2"] as $element)

        <div class="item_matcheado_cpanel">
          <p class="p item_matcheado_cpanel"> {{$matchFinal[$i]["articuloWished1"]->name}} </p>
        </div>

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
          <a class="dosUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["user1"]->id}}"><p>{{$matchFinal[$i]["user1"]->username}}</p></a>
          <a class="unoUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["user1"]->id}}"><img class="img_matcheado_cpanel" src="/storage/avatares/{{$matchFinal[$i]["user1"]->avatar}}" alt=""></a>

          {{-- intercambio --}}

          <button class="intercambio_button" type="button">
          <i class="fas fa-exchange-alt"></i>
          </button>


          {{-- user 2 --}}
          <a class="tresUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["userYo2"]->id}}"><img class="img_matcheado_cpanel" src="/storage/avatares/{{$matchFinal[$i]["userYo2"]->avatar}}" alt=""></a>
          <a class="cuatroUser item_matcheado_cpanel" href="/usuario/{{$matchFinal[$i]["userYo2"]->id}}"><p>{{$matchFinal[$i]["userYo2"]->username}}</p></a>
        </div>


        <div class="item_matcheado_cpanel">
        {{-- articulo 2 --}}
        <p class="unoArt item_matcheado_cpanel">QUIERE</p>
        <i class="dosArt fas fa-long-arrow-alt-right"></i>
        <a class="tresArt item_matcheado_cpanel" href="/articulo/{{$element->id}}"><img class="img_likeado_cpanel" src="/storage/articulos/{{$element->image1}}" alt=""></a>
        <i class="cuatroArt fas fa-long-arrow-alt-left"></i>
        <p class="cincoArt item_matcheado_cpanel">TIENE</p>
        </div>

        <div class="item_matcheado_cpanel">
          <p class="item_matcheado_cpanel"> {{$element->name}} </p>
        </div>

        {{-- <div class="item_matcheado_cpanel">
          <a class="dosUser item_matcheado_cpanel" href="/articulo/{{$element->id}}"><p>{{$element->name}}</p></a>
        </div> --}}
        <hr>
        @endforeach
    @endfor

    </div>


  </div>

@endsection
