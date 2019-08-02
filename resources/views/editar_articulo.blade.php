@extends("layouts.app")

@section("title")
  GREENDR - Modificar {{$articulo->name}}
@endsection

@section('content')

  <div class="contenedor_editarArticulo">


  <h3 class="h3_editarArticulo">MODIFICAR PLANTA:</h3>


  <h3 class="h3_editarArticulo">{{$articulo->name}}</h3>

  <input type="hidden" class="hidden_id" value="{{$articulo->id}}">


  <form class="form_editarArticulo" action="/editar_articulo/{{$articulo->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">

  <div class="items_editarArticulo">
        <label class="label_editarArticulo" for="nombre">Nombre: </label>

        <input class="input_editarArticulo" type="text" id="nombre" name="name"
        @if ($errors->get('name'))
        value=""
        @elseif (!$errors->get('name') && old('name'))
        value="{{ old('name') }}"
         @else
        value="{{$articulo->name}}"
        @endif
        autocomplete="name" autofocus>

        <p class="error_formularioSubida">@error('name') {{ $message }} @enderror</p>
  </div>

  <div class="items_editarArticulo">
        <label class="label_editarArticulo" for="n_cientifico">Nombre científico: </label>

        <input class="input_editarArticulo" type="text" id="n_cientifico" name="nomenclature"
        @if ($errors->get('nomenclature'))
        value=""
        @elseif (!$errors->get('nomenclature') && old('nomenclature'))
        value="{{ old('nomenclature') }}"
         @else
        value="{{$articulo->nomenclature}}"
        @endif
        autocomplete="nomenclature" autofocus>

        <p class="error_formularioSubida"> @error('nomenclature') {{ $message }} @enderror </p>
  </div>

  <div class="div_categoria items_editarArticulo">
        <label class="label_editarArticulo" for="">Categoría: </label>

  <div class="radio_items_editarArticulo">
        <label class="radio_label_editarArticulo" for="planta">Planta </label>
        @if (old('category_id') && old('category_id') == 1 || $articulo->category_id == 1)
        <input class="radio1_input_formularioSubida" type="radio" id="planta" name="category_id" value="1" checked>
        @else
        <input class="radio1_input_formularioSubida" type="radio" id="planta" name="category_id" value="1">
        @endif

        <label class="radio_label_editarArticulo" for="esqueje">Esqueje </label>
        @if (old('category_id') && old('category_id') == 2 || $articulo->category_id == 2)
        <input class="radio1_input_formularioSubida" type="radio" id="esqueje" name="category_id" value="2" checked>
        @else
        <input class="radio1_input_formularioSubida" type="radio" id="esqueje" name="category_id" value="2">
        @endif

        <label class="radio_label_editarArticulo" for="semillas">Semillas </label>
        @if (old('category_id') && old('category_id') == 3 || $articulo->category_id == 3)
        <input class="radio1_input_formularioSubida" type="radio" id="semillas" name="category_id" value="3" checked>
        @else
        <input class="radio1_input_formularioSubida" type="radio" id="semillas" name="category_id" value="3">
        @endif

        <label class="radio_label_editarArticulo" for="producto">Producto </label>
        @if (old('category_id') && old('category_id') == 4 || $articulo->category_id == 4)
        <input class="radio1_input_formularioSubida" type="radio" id="producto" name="category_id" value="4" checked>
        @else
        <input class="radio1_input_formularioSubida" type="radio" id="producto" name="category_id" value="4">
        @endif

        <label class="radio_label_editarArticulo" for="servicio">Servicio </label>
        @if (old('category_id') && old('category_id') == 5 || $articulo->category_id == 5)
        <input class="radio1_input_formularioSubida" type="radio" id="servicio" name="category_id" value="5" checked>
        @else
        <input class="radio1_input_formularioSubida" type="radio" id="servicio" name="category_id" value="5">
        @endif
  </div>
        <p class="error_formularioSubida"> @error('category_id') {{ $message }} @enderror </p>
  </div>

  <div class="items_editarArticulo">
        <label class="label_textarea_editarArticulo" for="desc">Descripción: </label>

        <textarea id="desc" name="description" rows="5" cols="45" placeholder="Información sobre la planta..."  >@if ($errors->get('description')) @elseif (!$errors->get('description') && old('description')){{old('description')}}@else{{$articulo->description}}@endif</textarea>

        <p class="error_formularioSubida"> @error('description') {{ $message }} @enderror  </p>
  </div>

  <div class="items_editarArticulo div_imagenes">
      <label class="label_editarArticulo" for="">Imágenes: </label>

      <div class="cada_imagen_editarArticulo">
        <img class="img_editarArticulo" src="/storage/articulos/{{$articulo->image1}}" alt="imagen1">
        <div class="cada_imagen_items_editarArticulo">
        <label class="label_editarArticulo" for="ModificarImagen1">Modificar imagen 1: </label>
        <input class="input_editarArticulo_avatar" type="file" id="ModificarImagen1" name="image1" value= "">

        <p class="error_formularioSubida"> @error('image1') {{ $message }} @enderror </p>
      </div>
      </div>

      <div class="cada_imagen_editarArticulo">
        @if($articulo->image2 != null)
          <img class="img_editarArticulo" src="/storage/articulos/{{$articulo->image2}}" alt="imagen2">
        @endif
      <div class="cada_imagen_items_editarArticulo">
        <label class="label_editarArticulo" for="ModificarImagen2">Elegir / modificar imagen 2: </label>
        <input class="input_editarArticulo_avatar" type="file" id="ModificarImagen2" name="image2" value= "">

        @if($articulo->image2 != null)
          <div class="editar_articulo_checkbox">
            <label class="label_checkbox_editarArticulo" for="delete_image_2">Borrar imagen 2:</label>
            <input class="input_checkbox_editarArticulo" type="checkbox" id="delete_image_2" name="delete_image_2" value="yes">
          </div>
        @endif

        <p class="error_formularioSubida"> @error('image2') {{ $message }} @enderror </p>
      </div>
      </div>

      <div class="cada_imagen_editarArticulo">
        @if($articulo->image3 != null)
        <img class="img_editarArticulo" src="/storage/articulos/{{$articulo->image3}}" alt="imagen3">
        @endif
        <div class="cada_imagen_items_editarArticulo">
        <label class="label_editarArticulo" for="ModificarImagen3">Elegir / modificar imagen 3: </label>
        <input class="input_editarArticulo_avatar" type="file" id="ModificarImagen3" name="image3" value= "">
        @if($articulo->image3 != null)
          <div class="editar_articulo_checkbox">
            <label class="label_checkbox_editarArticulo" for="delete_image_3">Borrar imagen 3:</label>
            <input class="input_checkbox_editarArticulo" type="checkbox" id="delete_image_3" name="delete_image_3" value="yes">
          </div>
        @endif
        <p class="error_formularioSubida"> @error('image3') {{ $message }} @enderror </p>
      </div>
      </div>

        <p>PENDIENTE: PREVIEW IMAGE</p>

    </div>

  <div class="items_editarArticulo">

      <p>PENDIENTE: SETEAR UBICACION</p>

  </div>

  <div class="items_editarArticulo">
       <button class="enviar_editarArticulo" type="submit"><p class="crear">GUARDAR CAMBIOS</p></button>
  </div>
</form>
  <div class="items_editarArticulo botones">
  <button class="descartar_editarArticulo" type="button">
  <a href="/articulo/{{$articulo->id}}"><p class="crear">DESCARTAR CAMBIOS</p></a>
  </button>

  <form class="formB_editarArticulo" action="" method="post">

  <button class="borrar_editarArticulo" type="submit">
  <a href=""><p class="crear">BORRAR PLANTA</p></a>
  </button>

  </form>

  <!-- botón no funciona... no sé porqué
  <button class="descartar_editarArticulo" type="button" name="button">
  <a href="editar_mis_articulos.php">DESCARTAR CAMBIOS</a>
  </button> -->

  </div>





  </div>

  <!-- Script -->
  <script src="{{ asset('js/editar_articulo.js') }}"></script>

@endsection
