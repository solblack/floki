@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/perfil.css') }}"/>
@endsection

@section('content')



<div class="admin-container">
    <div class="admin-panel-grid">
        <div class="admin-menu">
            <h2 class="h2perfil">Panel admin</h2>
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

        <div class="admin-panel">
            <h2 class="h2perfil">Agregar Productos</h2>
            <form action="/admin/addproducts" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required >
                </div>
                <div>
                    <label for="price">Precio</label>
                    <input class="form-control" type="number" name="price" value="{{ old('price') }}" required>
                </div>
                <div>
                    <label for="category">Categoria <span class="aclaracion">(presionar CTRL para selecionar varias opciones)</span></label>
                    <select multiple class="form-control select" type="select" name="category[]" value="">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="stock">Unidades</label>
                    <input class="form-control" type="number" name="stock" value="{{ old('stock') }}" required>
                </div>
                <div>
                    <label for="description">Descripción</label>
                    <textarea class="form-control" rows="5" type="textarea" name="description" value="{{ old('description') }}" required></textarea>
                </div>
                <div>
                    <label for="filename">Imágenes <span class="aclaracion">(presionar CTRL para selecionar varias imagenes)</span></label>
                    <input multiple class="form-control" type="file" name="filename[]" value="{{ old('filename') }}" required>
                </div>
                <button class="btn-admin" type="submit">CREAR</button>
            </form>
        </div>

    </div>

    <form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>
</div>
@endsection

@section('scripts')
<script src="./path/to/dropzone.js"></script>
@endsection
