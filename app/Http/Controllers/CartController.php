<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\ProductPhoto;
use Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('cart')->with('products', $products);
    }

    public function addToCart(Request $request)
    {

        $product = $request->all();

        // addtocart for users
        if (Auth()->check()) {
            $user = Auth::user();
            
            $carts = Cart::where('product_id', $request->id)->get();
            if (!count($carts)== 0) {
                $cart = $carts[0];
                $newquantity = $cart->quantity + $product["cantidad"];
                $cart->user_id = $user->id;
                $cart->product_id = $product['id'];
                $cart->quantity = $newquantity;
                $cart->save();
            } else {
                $newCart = Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['cantidad']
                ]);
                $newCart->save();
            }
        } else {
            // addtocart for session
            if (Session::has('cart')) {
                $cart = Session::get('cart');
            }
            if (isset($cart[$product['id']])) :
                $cart[$product['id']]['cantidad'] += $product['cantidad'];
            else :
                $cart[$product['id']] = $product;
            endif;

            Session::put('cart', $cart);
            $cartsInSession = Session::get('cart');
            $cartItems = count($cartsInSession);
        }

        return redirect()->back()->with('message', 'Hay nuevos productos en el carrito.')
            // ->with('cart_items', $cartItems)
            ->with('success', true);
    }

    public function updateCart(Request $request)
    {
        $product = $request->all();

        if (Auth()->check()){
            $carts = Cart::where('product_id', $request->id)->get();
            $cart = $carts[0];
            $cart->user_id = $product['user_id'];
            $cart->product_id = $product['id'];
            $cart->quantity = $product["cantidad"];
            $cart->save();
        } else {
            if (Session::has('cart')) {
                $cart = Session::get('cart');
            }
            if (isset($cart[$product['id']])) :
                $cart[$product['id']]['cantidad'] = $product['cantidad'];
            else :
                $cart[$product['id']] = $product;
            endif;
            Session::put('cart', $cart);
            $cartsInSession = Session::get('cart');
            $cartItems = count($cartsInSession);
        }
    }

    public function deleteFromCart(Request $request)
    {
        $cartCambios = $request->all();
        if (Auth()->check()) {
            $carts = Cart::where('product_id', $request->id)->get();
            $cart = $carts[0];
            $cart->delete();
        } else {
            $cart  = Session::get('cart');
            $cartIdABorrar = $cartCambios['id'];
            unset($cart[$cartIdABorrar]);
            Session::put('cart', $cart);
            if (empty($cart)) {
              Session::forget('cart');
            }
        }
    }

    public function checkoutSession()
    {
        
        $carts = Session::get('cart');
        $total = 0;
        foreach($carts as $cart){
            $total += $cart["cantidad"]* $cart["price"];
        }
        return view('checkoutguest')->with('carts', $carts)->with('total', $total);
    }

    public function checkoutUser()
    {
        $user = Auth::user();


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
        $carts = Cart::where('user_id', $user->id)->get();
        $total = 0;


        foreach($carts as $cart){
            $total += $cart->quantity* $cart->product->price;
        }

        return view('checkoutuser')->with('carts', $carts)->with('user', $user)->with('total', $total);
    }
}
