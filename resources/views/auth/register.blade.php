@extends('layouts/floki-template')

@section('title', '¡Registrate! - FLOKI Deco & Design')


@section('content')

<section class="section-registro">
    <div class="register">
        <!--Imagen-->
        <article class="art1 d-none d-lg-block">
            <img src="images/living.jpg" alt="living" width="100%" height="859px" />
        </article>
        <!--Form-->
        <article class="art2">
            <form class="formulario-registro" action="{{ route('register') }}" method="post">
                @csrf
                <p class="registrate">
                    ¡Registrate!
                </p>
                <div class="registrarsecon">
                    <article class="reg">
                        <i class="fab fa-google-plus-g"></i>
                    </article>
                    <article class="reg">
                        <i class="fab fa-facebook-f"></i>
                    </article>
                    <article class="reg">
                        <i class="fab fa-twitter"></i>
                    </article>
                </div>
                <div class="o-wrap2">
                    <hr />
                    <i class="far fa-circle"></i>
                </div>
                <p>
                    <input id="name" type="text" class="userform" name="name" value="{{ old('name') }}"
                        autocomplete="name" autofocus @error('name') @if (isset($message)) placeholder="{{ $message }}"
                        @enderror @else placeholder="Nombre" @endif>
                </p>

                <p>
                    <input id="last_name" type="text" class="userform" name="last_name" value="{{ old('last_name') }}"
                        autocomplete="last_name" autofocus @error('last_name') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Apellido" @endif>
                </p>
                <p>
                    <input id="email" type="text" class="userform" name="email" value="{{ old('email') }}"
                        autocomplete="email" autofocus @error('email') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Email" @endif>
                </p>

                <p>
                    <input id="password" type="password" class="userform" name="password" data-toggle="tooltip"
                        data-placement="top" title="La contraseña debe tener al menos 8 caracteres"
                        autocomplete="new-password" @error('password') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Contraseña" @endif>
                </p>

                <p>
                    <input id="password-confirm" type="password" class="userform" name="password-confirmation"
                        autocomplete="new-password" @error('password-confirmation') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Repita su contraseña" @endif>
                </p>

                <p>
                    <input type="hidden" name="newsletter" value=0>
                    <div ><input type="checkbox" name="newsletter" value=1>
                        <span class="tyc"> Deseo recibir novedades en mi email.</span>
                    </div>
                    <div >
                        <input id="tyc" type="checkbox" name="tyc">
                        <span class="tyc">Estoy de acuerdo con los <a href="#">términos y condiciones.</a></span>
                        <div>@error('tyc')
                        <small class="condiciones">{{ $message }}</small>
                        @enderror</div>
                    </div>
                    <input type="hidden" name="role" value="2">
                    <p>
                        <button id="send-button" type="submit" name="button">
                            <i class="far fa-paper-plane"></i> Enviar
                        </button>
                    </p>
            </form>
        </article>
    </div>
</section>
<br>
@endsection
