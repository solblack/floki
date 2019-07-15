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

        <div class="order-list productos-box">
          <div class="productos-title-box">
            <a href="#" id="navbarDropdown" role="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <h2 class="productos-title">Productos</h2><i class="fas fa-caret-down"></i>
            </a>
          </div>

            <div class="collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto productos-checkout-ul">
                    @foreach ($carts as $cart)
                    <li class="nav-item active productos-checkout">{{$cart["cantidad"]}} {{$cart["name"]}}
                        ${{$cart["price"]*$cart["cantidad"]}} </li>
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
                <h2>Tus datos</h2>
                <div>
                    <label for="name">Nombre</label>
                    <input class="form-control name " type="text" name="name">
                </div>
                <div>
                    <label for="last_name">Apellido</label>
                    <input class="form-control last_name " type="text" name="last_name" >
              </div>
                <div>
                    <label for="email">email</label>
                    <input class="form-control email " type="email" value="" name="email" >
              </div>
                <div>
                    <label for="address_line1">Direccion</label>
                    <input class="form-control address1 " type="text" value="" name="address_line1" >

                   <input class="form-control address2" id="addressline2" type="text" value="" name="address_line2" >
              </div>
                <div>
                    <label for="city">Ciudad</label>
                    <input class="form-control city" type="text" value="" name="city" >
              </div>
                <div>
                    <label for="zipcode">Código postal</label>
                    <input class="form-control zipcode" type="text" value="" name="zipcode" >
              </div>
                <div>
                    <label for="state">Provincia</label>
                    <input class="form-control state " type="text" value="" name="state" >
              </div>
                <div>
                    <label for="country">Pais</label>
                    <input class="form-control country" type="text" value="" name="country">
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

                <button class="orderbutton" type="submit" >Comprar</button>


            </form>
        </div>
    </div>

    @endsection
