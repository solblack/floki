@extends('layouts/floki-template')

@section('title', 'Admin - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection

@section('content')

<h2 class="titleperfil">Editar Usuario</h2>
<form class="form-group form-edit" action="/admin/updateuser" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div>
        <label class=""for="name">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{$user->name}}" >
    </div>
    <div>
        <label class="" for="last_name">Apellido</label>
        <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}" >
    </div>
    <div>
        <label class="" for="email">Email</label>
        <input class="form-control" type="text" name="email" value="{{$user->email}}" >
    </div>
    <div>
        <label class="" for="phone">Telefono</label>
        <input class="form-control" type="number" name="phone" value="{{$user->phone}}" >
    </div>
    <div>
        <label class="" for="birthday">Fecha de nacimiento</label>
        <input class="form-control" type="text" name="birthday" value="{{$user->birthday}}" >
    </div>
    <div>
        <label class="" for="role_id">Rol</label>
        <select class="form-control select " type="select" name="role_id">
        @foreach ($roles as $role)
        <option value="{{$role->id}}" @if($role->id==$user->role_id)
            selected
        @endif>{{$role->role}}</option>
        @endforeach
    </select>
</div>

    <button class="button" type="submit">Editar</button>
</form>


@endsection
