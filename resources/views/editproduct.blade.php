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

<h2 class="titleperfil">Editar Producto</h2>
<form class="form-group form-edit" action="/admin/updateproduct" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
    <div>
        <label class="" for="name">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{$product->name}}" required>
    </div>
    <div>
        <label class="" for="price">Precio</label>
        <input class="form-control " type="number" name="price" value="{{$product->price}}" required>
    </div>
    <div>
        <label for="category">Categoria <span class="aclaracion">(presionar CTRL para selecionar varias opciones)</span></label>
        <select multiple class="form-control select" type="select" name="category[]" value="{{$product->categories}}">
            @foreach ($categories as $category)
            <option

              @foreach ($product->categories as $productCategory)

                @if ($category->id == $productCategory->id)
                  selected
                @endif

              @endforeach
                    value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div>
        <label class="" for="stock">Unidades</label>
        <input class="form-control " type="number" name="stock" value="{{$product->stock}}" required>
    </div>
    <div>
        <label class="" for="description">Descripción</label>
        <textarea class="form-control " name="description" rows="4" required value="">{{$product->description}}</textarea>
    </div>
    <div>
        <label class="" for="filename">Subir imágenes</label>
        <input multiple class="form-control " type="file" name="filename[]" value="{{ old('filename') }}">

    </div>
    <div>
        <p>Imagenes cargadas</p>
        <div class="deleteimg">
            @foreach ($product->productPhotos as $photo)
            <div>
                <img class="img-grid-admin" src="/uploads/product_photos/{{$photo->filename}}" alt="">
                <a href="/admin/deletephoto/{{$photo->id}}"><i class="far fa-trash-alt"></i></a>
            </div>
            @endforeach
        </div>
    </div>
    <button class="button" type="submit">EDITAR</button>
</form>

@endsection
