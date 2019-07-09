@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('content')

<h1 class="titleperfil">Listado Ordenes</h1>

<table class="table table-hover table-responsive-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Email</th>
            <th scope="col">Productos</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody class="thead-light">
        @foreach ($orders as $order)
        <tr>
            <th scope="row"><a href="/admin/orderdetail">{{$order->id}}</a></th>
            <td>{{$order->user->email}}></td>
            {{-- @foreach ($order as $product)
            <td>{{$product->id}}-{{$product->name}}></td>
            @endforeach
            <td>{{$orders->amount}}</td> --}}
            {{-- Donde esta la cantidad por producto? --}}
            <td>{{$orders->orderDetail->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
