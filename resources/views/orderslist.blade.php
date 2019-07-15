@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/perfil.css') }}"/>
@endsection

@section('content')

  <ul class="menu-admin-horizontal">
      <li>
          <a class="listperfil" href="/admin/productslist">productos</a>
      </li>
      <li>
          <a class="listperfil" href="/admin/categorieslist">categorias</a>
      </li>
      <li>
          <a class="listperfil" href="/admin/orderslist">ordenes</a>
      </li>
      <li>
          <a class="listperfil" href="/admin/userslist">usuarios</a>
      </li>
      <li>
          <a class="listperfil" href="/profile">agregar producto</a>
      </li>
  </ul>

<h1 class="titleperfil">Listado Ordenes</h1>

<table class="table table-hover table-responsive-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Email</th>
            <th scope="col">Items</th>
            <th scope="col">Detalle Productos</th>
            <th scope="col">Total</th>

        </tr>
    </thead>
    <tbody class="thead-light">
        @foreach ($orders as $order)

        <tr>
            <th scope="row"><a href="/admin/orderdetail">{{$order->id}}</a></th>
            @if(isset($order->user_id))
            <td>{{$order->user->email}}</td>
            @else
            <td>{{$order->email}}</td>
            @endif
            <td>{{$order->items}}</td>
            <td>
                <ul>
                    @foreach ($order->orderDetails as $detail)
                    @foreach ($order->products as $product)
                    @if($detail->product_id == $product->id)
                    <li>{{$detail->amount}} {{$product->name}} : ${{$detail->amount*$detail->price}}</li>
                    @endif
                    @endforeach
                    @endforeach
                </ul>
            </td>
            <td>${{$order->amount}}</td>

        </tr>
        @endforeach
    </tbody>
</table>



@endsection
