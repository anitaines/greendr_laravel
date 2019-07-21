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

              {{-- @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror --}}

              {{-- @error('username')
                <p class="error_registro">{{ $message }}</p>
              @enderror --}}

              <p class="error_registro">@error('username') {{ $message }} @enderror</p>


              <datalist id="user_reg" >
              <?php foreach ($_COOKIE as $key => $value) :?>
              <?php if (is_numeric($key)) : ?>
              <option value="<?=$_COOKIE[$key]["user"]?>" >
              <?php endif; ?>
              <?php endforeach; ?>
              </datalist>
         </div>


         {{-- <div class="col-md-6">
             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

             @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div> --}}




         <div class="items_login">
               <label class="label_login" for="pass"> Contraseña: </label>
               <input class="input_login" id="pass" type="password" name="password" value= ""  >

               {{-- @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror --}}

              <p class="error_registro">@error('password') {{ $message }} @enderror</p>

         </div>

         {{-- <div class="col-md-6">
             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

             @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div> --}}


         <div class="radio_items_login">
           <label class="label_login" for="rec">Recordarme   </label>
           <input class="radio1_input_login" type="checkbox" id="rec" name="remember" value="si" {{ old('remember') ? 'checked' : '' }}>

           {{-- <label class="label_login_radio" for="norec">Dejar de recordarme????   </label>
           <input class="radio2_input_login" type="radio" id="norec" name="recordarme" value="no"> --}}

           @if (Route::has('password.request'))
             <label class="label_login_radio">
               <a class="label_login_radio" href="{{ route('password.request') }}">
                 ¿Olvidaste tu contraseña?
               </a>
            </label>
          @endif

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










{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
