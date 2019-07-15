<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Address;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use Illuminate\Support\Facades\Session;
use App\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        $orders = Order::all();

        return view('orderslist')->with('orders', $orders);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (Auth::check()) {
            $user_id = Auth::user()->id;

        } else {
            $user_id = null;
        }
        $address = Address::create([
            "user_id" => $user_id,
            "address_line1" => $request["address_line1"],
            "address_line2" => $request["address_line2"],
            "city" => $request["city"],
            "state" => $request["state"],
            "country" => $request["country"],
            "zipcode" => $request["zipcode"]
        ]);


        if (Auth::check()) {
            $json = $request["carts"];
            $carts = json_decode($json, true);
            $items = 0;
            $amount = 0;
            foreach ($carts as $cart) {
                $items += $cart["quantity"];
                $amount += $cart["product"]["price"]*$cart["quantity"];
            }
            $order = Order::create([
                "name" => $request["name"],
                "last_name" => $request["last_name"],
                "email" => $request["email"],
                "user_id" => $user_id,
                "items" => $items,
                "amount" => $amount,
                "order_status_id" => 1,
                "address_id" => $address->id,
                "shipping_id" => null,
            ]);

            foreach ($carts as $cart) {
                $orderDetail = OrderDetail::create([
                    "order_id" => $order->id,
                    "product_id" => $cart["product_id"],
                    "amount" => $cart["quantity"],
                    "price" => $cart["product"]["price"],
                ]);
            }
            $carts = Cart::where('user_id', $user_id)->get();
            foreach ($carts as $cart) {
                $cart->delete();
            }

            // guest
        }else {

            $carts = Session::pull('cart');
            $items = 0;
            $amount = 0;
            foreach ($carts as $cart) {
                $items += $cart["cantidad"];
                $amount += $cart["cantidad"]*$cart["price"];
            }

            $order = Order::create([
                "name" => $request["name"],
                "last_name" => $request["last_name"],
                "email" => $request["email"],
                "items" => $items,
                "amount" => $amount,
                "order_status_id" => 1,
                "address_id" => $address->id,
                "shipping_id" => null,
            ]);

            foreach ($carts as $cart) {
                $orderDetail = OrderDetail::create([
                    "order_id" => $order->id,
                    "product_id" => $cart["id"],
                    "amount" => $cart["cantidad"],
                    "price" => $cart["price"],
                ]);
            }
        }

        return view('success')->with("order", $order);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */

    protected function showOrders($id){
      
        $user = User::find($id);
        $orders = Order::where('user_id', $id)->get();
        return view('orders')->with('orders', $orders)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function showTest(){
        $order = Order::all()->first();

        return view('success')->with('order', $order);
    }
}
