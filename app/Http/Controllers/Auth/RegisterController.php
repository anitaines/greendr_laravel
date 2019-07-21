<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { $messages = [
      'required' => 'El :attribute debe estar completo.',
      'string' => 'El :attribute no debe tener caracteres especiales.STRING',
      'alpha' => 'El :attribute no debe tener números ni caracteres especiales.ALPHA',
      'max' => 'El :attribute debe tener :max caracteres como máximo',
      'min' => 'El :attribute debe tener :min caracteres como mínimo.',
      'email' => 'El :attribute debe ser un email.',
      'unique' => 'El :attribute ya se encuentra registrado.',
      'alpha_dash' => 'El :attribute no debe contener espacios.',
      'confirmed' => 'Las contraseñas no coinciden',
      'file' =>  'Error en la carga del archivo. Por favor volver a subir.',
      'image' => 'El archivo de la imagen solo puede ser jpeg, png o bmp.',
      'avatar.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.'
    ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'alpha_dash', 'string', 'max:255', 'unique:users'],
            'avatar' => ['file', 'image', 'max:2048'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ], $messages);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // dd($data);
      // dd($data['avatar']);

      if (isset($data['avatar'])) {
        $ruta = $data['avatar']->store("public/avatares");
        $nombreArchivo = basename($ruta);
      }else {
        $avatarSinUpload = rand (1,3);
        $nombreArchivo = $avatarSinUpload.".png";
      }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'avatar' => $nombreArchivo,
            'password' => Hash::make($data['password']),
        ]);
    }
}
