@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('content')



<div class="container perfil">
    <div class="row">
        <div class="col-12 col-sm-3 ">
            <h2 class="h2perfil">admin</h2>
            <ul>
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
            </ul>
        </div>
        <div class="col-12 col-sm-9">
            <h2 class="h2perfil">Agregar Productos</h2>
            <form action="/admin/addproducts" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" >
                </div>
                <div>
                    <label for="price">Precio</label>
                    <input class="form-control" type="number" name="price" value="{{ old('price') }}">
                </div>
                <div>
                    <label for="category">Categoria</label>
                    <select class="form-control select" type="select" name="category" value="{{ old('category') }}">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="stock">Unidades</label>
                    <input class="form-control" type="number" name="stock" value="{{ old('stock') }}">
                </div>
                <div>
                    <label for="description">Descripcion</label>
                    <input class="form-control" type="textarea" name="description" value="{{ old('description') }}">
                </div>
                <div>
                    <label for="filename">Imagenes</label>
                    <input class="form-control" type="file" name="filename" value="{{ old('filename') }}">
                </div>
                <button type="submit">CREAR</button>
            </form>
        </div>
    </div>
</div>
@endsection
