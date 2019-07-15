@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
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

<h1 class="titleperfil">Listado de productos</h1>

<table class="table table-hover table-responsive-lg">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Foto</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="thead-light">
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>${{$product->price}}</td>
            @if(isset($product->productPhotos->first()->filename))
            <td> <img class="img-grid-admin"
                    src="/uploads/product_photos/{{$product->productPhotos->first()->filename}}" alt=""></td>
                    @endif
            <td>
                    <a href="/admin/showproduct/{{$product->id}}"><button class="button">Editar</button> </a>
            </td>
            <td>
                <a href="/admin/deleteproduct/{{$product->id}}"><button class="button" name="button">Eliminar</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="contenedor-productos">
<div class="pagination-productos">
    {{$products->appends($_GET)->links()}}
</div>
</div>

</div>



@endsection
