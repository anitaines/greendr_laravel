@extends("layouts.app")

@section("title")
  GREENDR - {{$user->username}}
@endsection

@section('content')

  <div class="contenedor_editarMisArticulos">

  <!-- <h3 class="h3_nombre_perfil">USUARIO:</h3> -->

  <div class="nombre_perfil">
  <h3 class="h3_nombre_perfil">{{$user->username}}</h3>
  <img class="avatar_perfil" src="/storage/avatares/{{$user->avatar}}" alt="avatar">
  </div>


  <div class="main_editarMisArticulos">

    @foreach ($articulos as $key => $value)

  <article class="product_editarMisArticulos">

  <a class="odio_editarMisArticulos" href="/articulo/{{$value->id}}">
  <img class="photo_editarMisArticulos" src="/storage/articulos/{{$value->image1}}" alt="planta">

      <div class="texto_editarMisArticulos">
        <h3 class="h3_texto_editarMisArticulos">{{$value->categoria->name}}</h3>

        <h2 class="h2_texto_editarMisArticulos">{{$value->name}}</h2>
      </div>

    </a>
  </article>

  @endforeach

  </div>

  </div>

@endsection
