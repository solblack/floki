<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use App\Cart;

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
      'email' => "Por favor, ingrese un email con el formato usuario@mail.com",
      'min' => ['string' => 'La contraseña debe contener al menos :min caracteres'],
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

    $user = User::create([
      'name' => $data['name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'role_id' => $data['role'],
      'newsletter' => $data['newsletter']
    ]);

    if (Session::has('cart')) {

      $cartsSession = Session::pull('cart');

      foreach ($cartsSession as $cart) {
        $carts_db = Cart::where('product_id', $cart["id"])->get();
        if (isset($carts_db[0])) {
          $cart_db = $carts_db[0];
          $newquantity = $cart_db->quantity + $cart["cantidad"];
          $cart_db->user_id = $user["id"];
          $cart_db->product_id = $cart['id'];
          $cart_db->quantity = $newquantity;
          $cart_db->save();
        } else {
          Cart::create([
            'user_id' => $user["id"],
            'product_id' => $cart["id"],
            'quantity' => $cart["cantidad"]
          ]);
        }
      }
    }

    return $user;
  }
}
