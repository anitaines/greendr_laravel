<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Article;
use App\User;
use App\Rules\ValidatePassword;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();

      $articulos = Article::all()->filter(function ($articulo) {
      // dd($articulo);
      return $articulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');

      // $random = $articulos->random();
      // dd($random);
      $primerSlide = $articulos->pop();
      // dd($primerSlide, $articulos);

      return view("/control_panel", compact('user', 'articulos', 'primerSlide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $user = Auth::user();

      return view("/perfil", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    // public function update(Request $request, $id)
    {
      // dd($request);
      // dd($id);
      $user = Auth::user();

      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        // 'username' => ['required', 'alpha_dash', 'string', 'max:255', 'unique:users'],
        'avatar' => ['file', 'image', 'max:2048'],
        'password' => ['nullable','string', 'min:5', 'confirmed'],
        'oldPassword' => ['required', new ValidatePassword],
      ];

      $messages = [
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

      $this->validate($request, $rules, $messages);
      // @@dd($messages);

      if ($request->avatar) {
        $ruta = $request->avatar->store("public/avatares");
        $nombreArchivo = basename($ruta);
      }else {
        $nombreArchivo = $user->avatar;
      }

      if ($request->password) {
        $passwordVigente = Hash::make($request->password);
      }else {
        $passwordVigente = $user->password;
      }

      $user->name = $request->name;
      $user->email = $request->email;
      $user->avatar = $nombreArchivo;
      $user->password = $passwordVigente;

      // @@dd($user);

      //Guardar el objeto en db. Revisar que el modelo tenga $guarded o $fillable
      $user->save(); //save() también sirve para hacer actualización.

      return redirect("/control_panel");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
