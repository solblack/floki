@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('content')

<h2 class="titleperfil">Editar Categoria</h2>
<form class="form-group form-edit" action="/admin/updatecategory" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <div>
        <label class=""for="name">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{$category->name}}" >
    </div>
    <div>
        <label class="" for="url">Url</label>
        <input class="form-control" type="text" name="url" value="{{$category->url}}" >
    </div>
    <div>
            <label class="" for="is_main">Principal</label>
            <input type="checkbox" name="is_main" value="1"  @if ($category->is_main===1)
            checked
        @endif>
    </div>
    <button class="button" type="submit">Editar</button>
</form>


@endsection
