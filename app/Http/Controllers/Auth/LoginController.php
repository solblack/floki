<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Cart;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
 
    use AuthenticatesUsers;

   

        /**
         * Where to redirect users after login.
         *
         * @var string
         */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function authenticated(Request $request, $user)
    {
          
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
    }
  
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
}
