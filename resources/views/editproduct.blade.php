@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('content')

<h2 class="titleperfil">Editar Producto</h2>
<form class="form-group form-edit" action="/admin/updateproduct" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
    <div>
        <label class=""for="name">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{$product->name}}" >
    </div>
    <div>
        <label class="" for="price">Precio</label>
        <input class="form-control " type="number" name="price"
            value="{{$product->price}}">
    </div>
    <div>
        <label class="" for="category">Categoria</label>
        <select class="form-control select " type="select" name="category"
            value="{{$product->category}}">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="" for="stock">Unidades</label>
        <input class="form-control " type="number" name="stock"
            value="{{$product->stock}}">
    </div>
    <div>
        <label class="" for="description">Descripcion</label>
        <textarea class="form-control " name="description" rows="4"
            value="">{{$product->description}}</textarea>
    </div>
    <div>
        <label class="" for="filename">Subir imagenes</label>
        <input class="form-control " type="file" name="filename" value="{{ old('filename') }}">
        @if(isset($error))
            <small>{{$error}}</small>
        @endif
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
