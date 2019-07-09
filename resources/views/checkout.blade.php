@extends('layouts/floki-template')

@section('title', 'Checkout - FLOKI Deco & Design')


@section('content')

<h1>ACÁ VA EL CHECKOUT</h1>

@if (Session::has('cart'))

  @php
      $cantidadProductos = 0;
      $precioTotal = 0;

      foreach (Session::get('cart') as $cartId => $product) {
        $cantidadProductos += $product['cantidad'];
        $precioTotal += $product['price'] * $product['cantidad'];
      }

  @endphp

<div class="">
    <p>{{ $cantidadProductos }} Productos</p>

    @foreach (Session::get('cart') as $cartId => $product)
      <li>
{{ $product["cantidad"] }}x  {{  $product["name"]}} ${{ $product["price"] * $product["cantidad"] }}

<form class="" action="/borrarCartItem" method="post">
  @csrf
  <input type="hidden" name="cart-id" value="{{ $cartId }}">
  <button type="submit" name="button">Borrar item</button>

</form>
        </li>
    @endforeach

    <p>Total: ${{ $precioTotal }}</p>


</div>



@else
  <h1>No tiene productos en su carrito</h1>
@endif




@endsection
