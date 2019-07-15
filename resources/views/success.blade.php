@extends('layouts/floki-template')

@section('title', 'Checkout - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/order.css') }}"/>
@endsection

@section('content')

<div class="order-container">
  <div class="order-box">
    <div class="order-details">

      <h2>Gracias por su compra, {{$order->name}}!</h2>
      <p>Su orden ha sido recibida con éxito.</p>
      <p>Aquí estan los datos de su orden:</p>
      <ul>
          <li>Número de orden: {{$order->id}}</li>
          <li>Productos:
              <ul>
                  @foreach ($order->products as $product)
                  @foreach($order->orderDetails as $detail)
                  @if($detail->product_id == $product->id)
                      <li>{{$detail->amount}} {{$product->name}}: ${{$detail->amount*$product->price}}</li>
                      @endif
                  @endforeach
                  @endforeach
                  <p>Total: ${{$order->amount}}</p>
              </ul>
          </li>
      </ul>
      <br>
        <p>Si lo desea puede contactarnos haciendo click <a href="/contacto"><strong>aquí</strong></a>. </p>

    </div>



  </div>

</div>

@endsection
