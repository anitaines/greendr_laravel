@extends("layouts.app")

@section("title")
  GREENDR - Formulario de Carga
@endsection

@section('content')

  <div class="contenedor_formularioSubida">

  <h3 class="h3_formularioSubida">SUBIR PLANTA PARA INTERCAMBIO</h3>

  <form class="form_formularioSubida" action="/formulario_subida" method="post" enctype="multipart/form-data">
    @csrf

    <div class="items_formularioSubida">
          <label class="label_formularioSubida" for="nombre">Nombre: </label>

          <input class="input_formularioSubida" type="text" id="nombre" name="name" @if ($errors->get('name'))
          value=""
          @else
          value="{{ old('name') }}"
          @endif
        autocomplete="name" autofocus>

          <p class="error_formularioSubida"> @error('name') {{ $message }} @enderror </p>
    </div>

    <div class="items_formularioSubida">
          <label class="label_formularioSubida" for="n_cientifico">Nombre científico: </label>

          <input class="input_formularioSubida" type="text" id="n_cientifico" name="nomenclature" @if ($errors->get('nomenclature'))
          value=""
          @else
          value="{{ old('nomenclature') }}"
          @endif
        autocomplete="nomenclature" autofocus>

          <p class="error_formularioSubida"> @error('nomenclature') {{ $message }} @enderror </p>
    </div>

    <div class="div_categoria items_formularioSubida">
          <label class="label_formularioSubida" for="">Categoría: </label>

  <div class="radio_items_formularioSubida">
          <label class="radio_label_formularioSubida" for="planta">Planta: </label>
          @if (old('category_id') && old('category_id') == 1)
          <input class="radio1_input_formularioSubida" type="radio" id="planta" name="category_id" value="1" checked>
          @else
          <input class="radio1_input_formularioSubida" type="radio" id="planta" name="category_id" value="1">
          @endif

          <label class="label_formularioSubida" for="esqueje">Esqueje: </label>
          @if (old('category_id') && old('category_id') == 2)
          <input class="radio1_input_formularioSubida" type="radio" id="esqueje" name="category_id" value="2" checked>
          @else
          <input class="radio1_input_formularioSubida" type="radio" id="esqueje" name="category_id" value="2">
          @endif

          <label class="label_formularioSubida" for="semillas">Semillas: </label>
          @if (old('category_id') && old('category_id') == 3)
          <input class="radio1_input_formularioSubida" type="radio" id="semillas" name="category_id" value="3" checked>
          @else
          <input class="radio1_input_formularioSubida" type="radio" id="semillas" name="category_id" value="3">
          @endif

          <label class="label_formularioSubida" for="producto">Producto: </label>
          @if (old('category_id') && old('category_id') == 4)
          <input class="radio1_input_formularioSubida" type="radio" id="producto" name="category_id" value="4" checked>
          @else
          <input class="radio1_input_formularioSubida" type="radio" id="producto" name="category_id" value="4">
          @endif

          <label class="label_formularioSubida" for="servicio">Servicio: </label>
          @if (old('category_id') && old('category_id') == 5)
          <input class="radio1_input_formularioSubida" type="radio" id="servicio" name="category_id" value="5" checked>
          @else
          <input class="radio1_input_formularioSubida" type="radio" id="servicio" name="category_id" value="5">
          @endif
  </div>
          <p class="error_formularioSubida"> @error('category_id') {{ $message }} @enderror </p>
    </div>

    <div class="items_formularioSubida">
          <label class="label_descripcion label_formularioSubida" for="desc">Descripción: </label>

          <textarea id="desc" name="description" rows="5" cols="45" placeholder="Información sobre la planta..."  > {{ old('description') }} </textarea>

          <p class="error_formularioSubida"> @error('description') {{ $message }} @enderror </p>
    </div>

    <div class="items_formularioSubida">

          <label class="label_formularioSubida" for="">Imágenes: </label>

          <input class="input_formularioSubida_avatar" type="file" id="" name="image1" value= "">

          <p class="error_formularioSubida"> @error('image1') {{ $message }} @enderror </p>

          <input class="input_formularioSubida_avatar" type="file" id="" name="image2" value= "">

          <p class="error_formularioSubida"> @error('image2') {{ $message }} @enderror </p>

          <input class="input_formularioSubida_avatar" type="file" id="" name="image3" value= "">

          <p class="error_formularioSubida"> @error('image3') {{ $message }} @enderror </p>

          <p>PENDIENTE: PREVIEW IMAGE</p>

    </div>

    <div class="items_formularioSubida">

        <p>PENDIENTE: SETEAR UBICACION</p>

    </div>


  <!-- <input type="checkbox" name="recordarme" value="si"> Recordarme<br> -->

    <div class="items_formularioSubida">
         <button class="enviar_formularioSubida" type="submit"><p class="crear">SUBIR PLANTA</p></button>
    </div>

    <div class="items_formularioSubida">
         <button class="reset_formularioSubida" type="button">
  <a href="/formulario_subida"><p class="crear">RESET</p></a>
         </button>

         <!-- Type reset borra los datos cargados pero deja marcados los errores :( -->
         <!-- -Tip: Avoid reset buttons in your forms! It is frustrating for users if they click them by mistake.
         -Tip: Always specify the type attribute for the <button> element. Different browsers may use different default types for the <button> element. -->

    </div>

  </form>
  </div>

@endsection
