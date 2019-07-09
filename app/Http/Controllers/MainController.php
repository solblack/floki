<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\LoginUsers;

class MainController extends Controller
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

    // use RegistersUsers;

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
    protected function validateLogin(array $data)
    {
      $rules = [
        'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
        'password' => ['required', 'string', 'min:8'],
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
          'email' => 'email',
          'password' => 'contraseña',
        );

      $validator = Validator::make($request, $rules, $messages);
      $validator->setAttributeNames($niceNames);

        return $validator;

      }

//     public function rules()
//     {
//         return [
//             'email' => ['required', 'email', 'exists:users,email'],
//             'password'  => ['required', 'min:8', 'confirmed'],
//         ];
//     }
//
//     public function messages()
//     {
//         return [
//           'failed' => 'No coindicen esos datos',
//             'email.required' => 'ingrese un email',
//             'email.exists' => 'Ese email no existe',
//             'email' => 'ingrese un mail válido con formato usuario@mail.com',
//             'min' => [ 'string' => 'La :attribute debe tener al menos :min caracteres'],
//             'password.required'  => 'ingrese contraseña',
//             'password.confirmed' => 'La contraseña no coincide'
//         ];
//     }
//     public function attributes()
// {
//     return [
//         'email' => 'e-mail',
//         'password' => 'contraseña',
//     ];
// }
//
//   public function getFailedLoginMessage(){
//
//     return [
//       'failed' => 'No coindicen esos datos',
//       'throttle' => 'Muchos intentos. Please try again in :seconds seconds.',
//     ];
//
// }


}
