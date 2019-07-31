@extends("layouts.app")

@section("title")
  GREENDR - Búsqueda
@endsection

@section('content')

<div class="contenedor_resultados">

  <h5 class="h5_resultados">Resultado búsqueda para:  </h5>
  <h3 class="h3_resultados">{{$param}}</h3>

<div class="contenido_contenedor_resultados">

<div class="filtros_resultados">

<form class="form_filtros_resultados" action="" method="post">

  <div class="items_filtros_resultados">
  <label for="resultados_all">Mostrar todos los resultados</label>
  <input type="checkbox" id="resultados_all" name="resultados" value="resultados" checked>
  </div>

  <div class="label_categorias_resultados">

  <label for="">Filtrar los resultados por categoría:</label>

  <div class="categorias_resultados">
    <label for="planta">Planta</label>
    <input type="checkbox" id="planta" name="category_id" value="1">
    <label for="esqueje">Esqueje</label>
    <input type="checkbox" id="esqueje" name="category_id" value="2">
    <label for="semillas">Semillas</label>
    <input type="checkbox" id="semillas" name="category_id" value="3">
    <label for="producto">Producto</label>
    <input type="checkbox" id="producto" name="category_id" value="4">
    <label for="servicio">Servicio</label>
    <input type="checkbox" id="servicio" name="category_id" value="5">
  </div>

  </div>

  <div class="items_filtros_resultados">
  <label for="resultados_nomenclature">Filtrar por nombre científico</label>
  <input type="checkbox" id="resultados_nomenclature" name="nomenclature" value="nomenclature">
  </div>

  <div class="items_filtros_resultados">
  <label for="resultados_name">Filtrar por nombre común</label>
  <input type="checkbox" id="resultados_name" name="name" value="name">
  </div>

  <div class="items_filtros_resultados">
  <label for="username">Buscar en nombres de usuario</label>
  <input type="checkbox" id="username" name="username" value="username">
  </div>

  {{-- <button type="submit" name="button">
  </button> --}}
</form>

</div>


<div class="resultados_resultados">

@foreach ($resultados as $resultado)

<article class="product_editarMisArticulos">

<a class="odio_editarMisArticulos" href="/articulo/{{$resultado->id}}">
<img class="photo_editarMisArticulos" src="/storage/articulos/{{$resultado->image1}}" alt="planta">

  <div class="texto_editarMisArticulos">
    <h3 class="h3_texto_editarMisArticulos texto_resultados">{{$resultado->categoria->name}}</h3>

    <h2 class="h2_texto_editarMisArticulos texto_resultados">{{$resultado->name}}</h2>
  </div>

</a>
</article>

@endforeach

{{ $resultados->links() }}
definir pagination y vh en mobile. reactivar token
</div>



</div>

</div>

@endsection
