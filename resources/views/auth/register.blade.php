@extends('layouts/floki-template')

@section('title', '¡Registrate! - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/forms.css') }}"/>
@endsection


@section('content')

<section class="form-container">
  <div class="div-inside-container">

    <div class="form-box" data-aos="zoom-in" data-aos-duration="1000">

      <h1 class="form-title">
          ¡Registrate!
      </h1>
      <div class="validacion-redes">
          <a class="redes-icon">
              <i class="fab fa-instagram"></i>
          </a>
          <a class="redes-icon">
              <i class="fab fa-facebook-f"></i>
          </a>
          <a class="redes-icon">
              <i class="fab fa-twitter"></i>
          </a>
      </div>
      <div class="o-wrap">
          <div class="hr">
            <hr>
            <hr>
          </div>
          <i class="far fa-circle"></i>
      </div>


      <form action="{{ route('register') }}" method="post">
                @csrf



                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        autocomplete="name" autofocus @error('name') @if (isset($message)) placeholder="{{ $message }}"
                        @enderror @else placeholder="Nombre" @endif>


                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"
                        autocomplete="last_name" autofocus @error('last_name') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Apellido" @endif>


                    <input id="email" type="text"  name="email" value=""
                        autocomplete="email" autofocus @error('email') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Email" @endif>


                    <input id="password" type="password"  name="password" data-toggle="tooltip"
                        data-placement="top" title="La contraseña debe tener al menos 8 caracteres"
                        autocomplete="new-password" @error('password') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Contraseña" @endif>


                    <input id="password-confirm" type="password"  name="password-confirmation"
                        autocomplete="new-password" @error('password-confirmation') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Repita su contraseña" @endif>


                    <input type="hidden" name="newsletter" value=0>
                    <div class="opciones2">
                      <input class="checkbox" type="checkbox" name="newsletter" value=1>
                      <span class="checkbox-text"> Deseo recibir novedades en mi email.</span>
                    </div>

                    <div class="opciones2" >
                        <input class="checkbox" id="tyc" type="checkbox" name="tyc">
                        <span class="checkbox-text">Estoy de acuerdo con los <a href="/faq#privacidad">términos y condiciones.</a></span>
                        <div class="opciones">@error('tyc')
                        <p class="condiciones">{{ $message }}</p>
                        @enderror</div>
                    </div>

                    <input type="hidden" name="role" value="2">

                    <button class="send-button" id="send-button" type="submit" name="button">
                            <i class="far fa-paper-plane"></i> Enviar
                    </button>

            </form>
        </div>
    </div>

</section>

@endsection
