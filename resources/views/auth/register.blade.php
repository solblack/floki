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
                        autocomplete="name" autofocus placeholder="Nombre">

                    <div class="opciones">
                      @error('name')
                          <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                      @enderror
                    </div>


                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"
                        autocomplete="last_name" autofocus placeholder="Apellido">

                    <div class="opciones">
                      @error('last_name')
                          <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                      @enderror
                    </div>


                    <input id="email" type="text"  name="email" value="{{ old('email') }}"
                        autocomplete="email" autofocus placeholder="Email">

                    <div class="opciones">
                      @error('email')
                          <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                      @enderror
                    </div>

                    <input id="password" type="password"  name="password" data-toggle="tooltip"
                        data-placement="top" title="La contraseña debe tener al menos 8 caracteres"
                        autocomplete="new-password" placeholder="Contraseña">

                    <div class="opciones">
                      @error('password')
                          <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                      @enderror
                    </div>

                    <input id="password-confirm" type="password"  name="password-confirmation"
                        autocomplete="new-password" placeholder="Repita su contraseña">

                    <div class="opciones">
                      @error('password-confirmation')
                          <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                      @enderror
                    </div>

                    <input type="hidden" name="newsletter" value=0>
                    <div class="opciones2">
                      <input class="checkbox" type="checkbox" name="newsletter" value=1>
                      <span class="checkbox-text"> Deseo recibir novedades en mi email.</span>
                    </div>

                    <div class="opciones2" >
                        <input class="checkbox" id="tyc" type="checkbox" name="tyc">
                        <span class="checkbox-text">Estoy de acuerdo con los <a href="/faq#privacidad">términos y condiciones.</a></span>

                        <div class="opciones">@error('tyc')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
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
