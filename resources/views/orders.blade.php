@extends('layouts/floki-template')

@section('title', 'Mis Ordenes - FLOKI Deco & Design')


@section('css')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}" />
@endsection


@section('content')



<div class="perfil">
    <div class="profile-box" data-aos="zoom-in" data-aos-duration="1000">

      <div class="profile-grid">
          <div class="profile-menu">
              <h2 class="h2perfil">Hola {{ $user->name }}!</h2>
              <ul class="menu">
                  <li>
                      <a class="listperfil" href="/profile">perfil</a>
                  </li>
                  <li>
                      <a class="listperfil" href="/profile/orders/{{$user->id}}">ordenes</a>
                  </li>
                  <li>
                      <a class="listperfil" href="/profile/addresses/{{$user->id}}">direcciones</a>
                  </li>
              </ul>
          </div>
          <div class="seccion-content  userorders">
                <h2 class="h2perfil2">Ordenes</h2>
                {{-- @php
                  dd($orders)
                @endphp --}}

              @if ($orders->count() == 0)

                <h3 class="h3perfil">No hay ordenes para mostrar.</h3>

              @endif


                @foreach($orders as $order)
                <div class="ordercontainer">
                    <div class="ordercol col1">
                        <div>Número de órden: {{$order->id}} </div>

                        <div>
                            <a href=""> @if(isset($order->shipping))
                                {{$order->shipping->tracking_number}}{{$order->shipping->courier_company}}
                                @endif </a></div>
                    </div>
                    <div class="ordercol col2">Dirección:
                        <div>{{$order->address['address_line1']}} {{$order->address['address_line2']}}</div>
                        <div>{{$order->address['city']}} CP:{{$order->address['zipcode']}}</div>
                        <div>{{$order->address['state']}} {{$order->address['country']}}</div>
                    </div>
                    <div class="ordercol col3">
                        <ul>
                            <div>Productos:</div>
                            @foreach ($order->products as $product)
                            @foreach ($order->orderDetails as $detail)
                            @if($detail->product_id == $product->id)
                            <li>{{$detail->amount}} x {{$product->name}} (${{$detail->price}}) =
                                ${{$detail->amount*$detail->price}}</li>
                            @endif
                            @endforeach
                            @endforeach
                        </ul>
                    </div>



                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>

    @endsection
