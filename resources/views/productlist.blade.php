@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('content')

<h1 class="titleperfil">Listado Productos</h1>

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
            <td>{{$product->price}}</td>
            <td> <img class="img-grid-admin"
                    src="/uploads/product_photos/{{$product->productPhotos->first()->filename}}" alt=""></td>
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
