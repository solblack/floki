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

<h1 class="titleperfil">Listado Categorias</h1>

<table class="table table-hover table-responsive-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Url</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="thead-light">
        @foreach ($categories as $category)

        <tr class="category-row">
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}} </td>
            <td>{{$category->url}}</td>
            <td><a href="/admin/editcategory/{{$category->id}}"><button class="button" name="button">Editar</button></a>
            </td>
            @if (count($category->products)>0)
            <td><button name="button" class="button delete btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Eliminar</button>
            </td>
                <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                              <p>No se puede eliminar categorías con productos asociados.</p>
                            </div>
                          </div>
                        </div>
                      </div>
            @else
               <td><a href="/admin/deletecategory/{{$category->id}}"><button class="button delete" name="button">Eliminar</button></a>
            </td>
            @endif
        </tr>
        @endforeach
        <tr class="category-row">
            <form action="/admin/addcategory" method="post">
                @csrf
                <input type="hidden" value="{{count($categories)+1}}" name="id">
                <th scope="row">{{count($categories)+1}}</th>
                <td><input type="text" value="" name="name"> </td>
                <td><input type="text" value="" name="url"></td>
                <td><select name="is_main" class="category-select">
                    <option value="1" selected>Principal</option>
                    <option value="0" >Secundaria</option>
                </select>
                </td>
                <td><button class="button category-add" name="button">Crear</button></td>
            </form>
            </tr>
    </tbody>
</table>

@endsection
