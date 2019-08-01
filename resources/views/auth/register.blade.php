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

            {{-- @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}

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

            {{-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}

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

            {{-- @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}

            @error('username')
              <p class="error_registro">{{ $message }}</p>
            @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="avatar">Imagen de perfil (campo no obligatorio): </label>
          <input class="input_registro_avatar" type="file" id="avatar" name="avatar" value= "{{ old('avatar') }}">

          {{-- @error('avatar')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror --}}

          @error('avatar')
            <p class="error_registro">{{ $message }}</p>
          @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="pass">Contraseña: </label>
          <input class="input_registro" type="password" id="pass" name="password" value= "" placeholder="Debe tener como mínimo 5 caracteres">

          {{-- @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror --}}

          @error('password')
            <p class="error_registro">{{ $message }}</p>
          @enderror
    </div>

    <div class="items_registro">
          <label class="label_registro" for="pass2">Confirmar contraseña: </label>
          <input class="input_registro" type="password" id="pass2" name="password_confirmation" value= "">
    </div>

  <!-- <input type="checkbox" name="recordarme" value="si"> Recordarme<br> -->

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














{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @error('name')
                                  <h4>prueba error</h4>
                                  <p>{{ $message }}</p>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="text" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar" autofocus>

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
