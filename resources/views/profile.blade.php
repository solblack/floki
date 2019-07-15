@extends('layouts/floki-template')

@section('title', 'Mi Perfil - FLOKI Deco & Design')

@section('css')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}" />
@endsection


@section('content')



<div class="perfil">
    <div class="profile-box" data-aos="zoom-in" data-aos-duration="1000">

      <div class="profile-grid">
          <div class="profile-menu">
              <h2 class="h2perfil">Hola {{ $user->name }}!</h2>
              <ul class="menu">
                  <li>
                      <a class="listperfil" href="/profile">perfil</a>
                  </li>
                  <li>
                      <a class="listperfil" href="/profile/orders/{{$user->id}}">ordenes</a>
                  </li>
                  <li>
                      <a class="listperfil" href="/profile/addresses/{{$user->id}}">direcciones</a>
                  </li>
              </ul>
          </div>
          <div class="seccion-content formperfil">
                <h2 class="h2perfil2">perfil</h2>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div>
                        <label for="name">Nombre</label>
                        <input id="name" class="userform form-control" type="text" name="name" value="{{$user->name}}"
                            @error('name') @if (isset($message)) placeholder="{{ $message }}" @endif> @enderror>
                    </div>
                    <div>
                        <label for="last_name">Apellido</label>
                        <input id="last_name" class="userform form-control" type="text" name="last_name"
                            value="{{$user->last_name}}" @error('last_name') @if (isset($message))
                            placeholder="{{ $message }}" @enderror @endif>
                    </div>

                    <div>
                        <label for="phone">Telefono</label>
                        <input id="phone" class="userform form-control" type="number" name="phone"
                            value="{{$user->phone}}">
                        @error('phone')
                        <small class="tyc">{{$message }}</small>
                        @enderror

                    </div>
                    <div>
                        <label for="birthday">Cumpleaños</label>
                        <input id="birthday" class="userform form-control" type="date" name="birthday"
                            value="{{$user->birthday}}">
                        @error('birthday')
                        @if (isset($message))
                        <small class="tyc">{{$message }}</small>
                        @enderror
                        @endif
                    </div>

                    <button class="button" type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
