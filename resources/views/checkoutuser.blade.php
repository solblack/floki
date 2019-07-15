@extends('layouts/floki-template')

@section('title', 'Checkout - FLOKI Deco & Design')

@section('css')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}" />
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/checkout.js') }}"> </script>
@endsection

@section('content')

<div class="container-checkout">
    <div class="checkout-box" data-aos="zoom-in" data-aos-duration="1000">

        <div class="checkout-title">
            <h1>Checkout</h1>
        </div>

        <div class="order-list">
          <div class="productos-title-box">
            <a href="#" id="navbarDropdown" role="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <h2 class="productos-title">Productos</h2><i class="fas fa-caret-down"></i>
            </a>
          </div>

            <div class="collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto productos-checkout-ul">
                    @foreach($carts as $cart)
                    <li class="nav-item active productos-checkout">
                        {{ $cart->quantity }} x {{ $cart->product->name}}
                        ${{ $cart->product->price * $cart->quantity}}
                    </li>
                    @endforeach
                    <li class="li-cart-total productos-checkout">
                        Total: ${{ $total }}
                    </li>
                </ul>
            </div>

        </div>

        <div class="order-form">
            <form action="/order" method="POST">
                @csrf
                <input type="hidden" value="{{$carts}}" name="carts">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input class= "email" type="hidden" name="email" value="{{$user->email}}">
                <h2>Tus datos</h2>
                <div>
                    <label for="name">Nombre</label>
                    <input class="form-control name " type="text" value="{{$user->name}}" name="name"
                        placeholder="{{$user->name}}">
                </div>
                <div>
                    <label for="last_name">Apellido</label>
                    <input class="form-control last_name " type="text" value="{{$user->last_name}}" name="last_name"
                        placeholder="{{$user->last_name}}">
                </div>
                <div>
                    <label for="address_line1">Direccion </label>
                    <input class="form-control address1" type="text" name="address_line1" @if($user->addresses->first())
                    value="{{$user->addresses->first()->address_line1}}" @endif >

                    <input class="form-control address2" type="text" name="address_line2" @if($user->addresses->first())
                    value="{{$user->addresses->first()->address_line2}}" @endif>
                </div>
                <div>
                    <label for="city">Ciudad</label>
                    <input class="form-control city" type="text" name="city" @if($user->addresses->first())
                    value="{{$user->addresses->first()->city}}" @endif>

                </div>
                <div>
                    <label for="zipcode">Código postal</label>
                    <input class="form-control zipcode " type="text" name="zipcode" @if($user->addresses->first())
                    value="{{$user->addresses->first()->zipcode}}" @endif>

                </div>
                <div>
                    <label for="state">Provincia</label>
                    <input class="form-control state" type="text" name="state" @if($user->addresses->first())
                    value="{{$user->addresses->first()->state}}" @endif>
                </div>
                <div>
                    <label for="contry">Pais</label>
                    <input class="form-control country" type="text" name="country" @if($user->addresses->first())
                    value="{{$user->addresses->first()->country}}" @endif>
                </div>

                <div>
                    <label>Pagá con:</label>
                    <div class="payment">
                        <div><a href="https://www.mercadopago.com.ar/" target="_blank"><img src="/images/payment/mercadopago.jpg"
                                    alt=""></a>
                        </div>
                        <div><a href="https://www.paypal.com" target="_blank"><img src="/images/payment/paypal.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <button class="orderbutton" type="submit">Comprar</button>

            </form>
        </div>
    </div>
    </div>

    @endsection
