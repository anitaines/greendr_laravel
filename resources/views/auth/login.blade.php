@extends('layouts.app')

@section("title")
  GREENDR - Login
@endsection

@section('content')

  <div class="contenedor_login">

  <h3 class="h3_login">INICIO DE SESIÓN</h3>

       <form class="form_login" action="{{ route('login') }}" method="post">
         @csrf

         <div class="items_login">
               <label class="label_login" for="nombre">Nombre de usuario o e-mail: </label>

              <input class="input_login" type="text" id="nombre" list="user_reg" name="login" autocomplete="off" value="{{ old('login') }}" >
              {{-- @dd($errors) --}}

              <p class="error_registro">@error('username') {{ $message }} @enderror</p>

         </div>


         <div class="items_login">
               <label class="label_login" for="pass"> Contraseña: </label>
               <input class="input_login" id="pass" type="password" name="password" value= ""  >

              <p class="error_registro">@error('password') {{ $message }} @enderror</p>

         </div>

         <div class="radio_items_login">
           <label class="label_login" for="rec">Recordarme   </label>
           <input class="radio1_input_login" type="checkbox" id="rec" name="remember" value="si" {{ old('remember') ? 'checked' : '' }}>

        </div>

        <div class="items_login">
          <button class="enviar_login" type="submit"><p class="">LOG IN</p></button>

        </div>

       </form>

       <div class="items_login registrar">
             <p class="p_login">¿No tenés una cuenta?</p>
             <a href="{{ route('register') }}">
             <button class="button_registro_login" type="button" name="submit">
             Registrate acá
             </button>
             </a>
       </div>

  </div>

@endsection
