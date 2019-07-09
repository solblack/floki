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
    protected $redirectTo = '/';

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
    {
      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        'tyc' => ['accepted'],
      ];

      $messages = [
        'required' => 'El campo :attribute es obligatorio',
        'string' => 'El campo :attribute debe contener solo letras',
        'unique:users' => 'El email ya se encuentra registrado',
        'email' => "Por favor use el formato: usuario@ejemplo.com",
        'min' => [ 'string' => 'La :attribute debe tener al menos :min caracteres'],
        'accepted' => 'Por favor acepte los :attribute',
        'confirmed' => 'Las contraseñas no coinciden'
      ];

      $niceNames = array(
          'name' => 'nombre',
          'last_name' => 'apellido',
          'email' => 'email',
          'password' => 'contraseña',
          'tyc' => 'términos y condiciones',
      );

      $validator = Validator::make($data, $rules, $messages);
      $validator->setAttributeNames($niceNames);

        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // if (!isset($data['newsletter'])) {
      //   return $data['newsletter'] = 0;
      // }

        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role'],
            'newsletter' => $data['newsletter']
        ]);
    }

}
