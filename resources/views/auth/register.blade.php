@extends('layouts.app')

@section("title")
  GREENDR - Login
@endsection

@section('content')

  <div class="contenedor_registro">

  <h3 class="h3_registro">REGISTRO DE USUARIO</h3>

  <form class="form_registro" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf

    <div class="items_registro">
          <label class="label_registro" for="nombre">Nombre y apellido: </label>

          <input class="input_registro" type="text" id="nombre" name="name" placeholder="Los otros usuarios no verán esta información" @if ($errors->get('name'))
          value=""
          @else
          value="{{ old('name') }}"
          @endif autocomplete="name" autofocus>

            @error('name')
              <p class="error_registro">{{ $message }}</p>
            @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="email">E-mail: </label>

          <input class="input_registro" type="text" id="email" name="email"  placeholder="Los otros usuarios no verán esta información" @if ($errors->get('email'))
          value=""
          @else
          value="{{ old('email') }}"
          @endif autocomplete="email" autofocus>

            @error('email')
              <p class="error_registro">{{ $message }}</p>
            @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="user">Elegí tu nombre de usuario: </label>

          <input class="input_registro" type="text" id="user" name="username" @if ($errors->get('username'))
          value=""
          @else
          value="{{ old('username') }}"
          @endif autocomplete="username" autofocus>

            @error('username')
              <p class="error_registro">{{ $message }}</p>
            @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="avatar">Imagen de perfil (campo no obligatorio): </label>
          <input class="input_registro_avatar" type="file" id="avatar" name="avatar" value= "{{ old('avatar') }}">

          @error('avatar')
            <p class="error_registro">{{ $message }}</p>
          @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="pass">Contraseña: </label>
          <input class="input_registro" type="password" id="pass" name="password" value= "" placeholder="Debe tener como mínimo 5 caracteres">

          @error('password')
            <p class="error_registro">{{ $message }}</p>
          @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="pass2">Confirmar contraseña: </label>
          <input class="input_registro" type="password" id="pass2" name="password_confirmation" value= "">
    </div>


    <div class="items_registro">
         <button class="enviar_registro" type="submit"><p class="crear">CREAR CUENTA</p></button>
    </div>
{{-- @dd($errors); --}}
  </form>

  <div class="items_registro loguear">
        <p class="p_registro">¿Ya tenés una cuenta?</p>
        <a href="{{ route('login') }}">
        <button class="button_registro_loguear" type="button" name="submit">
        Iniciá sesión acá
        </button>
        </a>

  </div>

  </div>

@endsection
