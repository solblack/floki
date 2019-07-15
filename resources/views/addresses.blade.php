@extends('layouts/floki-template')

@section('title', 'Mis Direcciones - FLOKI Deco & Design')

@section('css')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}" />
@endsection

@section('content')

<div class=" perfil">
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
            <div class="seccion-content  userorders addresses">
                <h2 class="h2perfil2">Direcciones</h2>

        @if ($addresses->count() == 0)

                  <h3 class="h3perfil">No hay direcciones guardadas.</h3>

                @endif

                @foreach($addresses as $address)
                <div class="addresscontainer">
                        <div>{{$address->address_line1}} {{$address->address_line2}} {{$address->city}} CP:{{$address->zipcode}} {{$address->state}} {{$address->country}}</div>
                        <a href="/profile/deleteaddress/{{$address->id}}"><button class="deletebtn"><i class="fas fa-times-circle"></i></button></a>

                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>

@endsection
