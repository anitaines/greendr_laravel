@extends("layouts.app")

@section("title")
  GREENDR - Mi Perfil
@endsection

@section('content')


<div class="contenedor_perfil">


<h3 class="h3_perfil">MIS DATOS</h3>

<div class="nombre_perfil">
<h3 class="h3_nombre_perfil">{{"Nombre de usuario: ". $user->username}}</h3>
<img class="avatar_perfil" src="/storage/avatares/{{$user->avatar}}" alt="avatar">
</div>


<form class="form_perfil" action="/perfil" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="_method" value="PUT">

<input type="hidden" name="id" value="{{$user->id}}">
{{-- sigue siendo necesario esto sin el constructor del objeto usuario? --}}

  <div class="items_perfil">
        <label class="label_perfil" for="nombre">Nombre y apellido: </label>

        <input class="input_perfil" type="text" id="nombre" name="name" placeholder="Los otros usuarios no verán esta información"
       @if ($errors->get('name'))
       value=""
     @elseif (!$errors->get('name') && old('name'))
       value="{{ old('name') }}"
        @else
       value="{{$user->name}}"
       @endif
       autocomplete="name" autofocus>

        <p class="error_registro">@error('name') {{ $message }} @enderror</p>
  </div>

  <div class="items_perfil">
        <label class="label_perfil" for="email">E-mail: </label>

        <input class="input_perfil" type="text" id="email" name="email"  placeholder="Los otros usuarios no verán esta información"
        @if ($errors->get('email'))
          value=""
        @elseif (!$errors->get('email') && old('email'))
          value="{{ old('email') }}"
        @else
          value="{{$user->email}}"
        @endif
        autocomplete="email" autofocus>

        <p class="error_registro">@error('email') {{ $message }} @enderror</p>

  </div>

  <div class="items_perfil">
        <label class="label_perfil_avatar" for="avatar">Elegí una imagen de perfil: </label>
        <input class="input_perfil_avatar" type="file" id="avatar" name="avatar" value= "">

        <p class="error_registro">@error('avatar') {{ $message }} @enderror</p>
  </div>

  <div class="items_perfil">
        <label class="label_perfil" for="nPass">Nueva contraseña: </label>
        <input class="input_perfil" type="password" id="nPass" name="password" value= "" placeholder="Debe tener como mínimo 5 caracteres">
        <p class="error_registro">@error('password') {{ $message }} @enderror</p>
  </div>

  <div class="items_perfil">
        <label class="label_perfil" for="nPass2">Repetir nueva contraseña: </label>
        <input class="input_perfil" type="password" id="nPass2" name="password_confirmation" value= "" >
  </div>

  <div class="items_perfil">
    <p class="p_perfil">Necesitás ingresar tu contraseña original para modificar los datos</p>
        <label class="label_perfil" for="pass">Contraseña: </label>
        <input class="input_perfil" type="password" id="pass" name="oldPassword" value= "" >

        <p class="error_registro">@error('oldPassword') {{ $message }} @enderror</p>
  </div>

  <div class="items_perfil">
       <button class="enviar_perfil" type="submit"><p class="crear">GUARDAR CAMBIOS</p></button>
  </div>

</form>
{{-- @dd($errors); --}}
<div class="items_perfil descartar">
<button class="descartar_perfil" type="button">
<a href="/control_panel"><p class="crear">DESCARTAR CAMBIOS</p></a>
</button>
</div>

</div>

@endsection
