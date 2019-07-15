@extends('layouts/floki-template')

@section('title', '¡Contactános! - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/forms.css') }}"/>
@endsection


@section('content')

  <section class="form-container">
    <div class="div-inside-container">

      <div class="form-box" data-aos="zoom-in" data-aos-duration="1000">

        <h1 class="form-title">
            ¡Contactános!
        </h1>

        <div class="validacion-redes">
            <a href="https://instagram.com" target="_blank" class="redes-icon">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://facebook.com" target="_blank" class="redes-icon">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="redes-icon">
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

        <form class="formulario" action="/contacto" method="post">
                @csrf


                    <input id="name" type="text"name="name" value="{{ old('name') }}"
                        autocomplete="name" autofocus @error('name') @if (isset($message)) placeholder="{{ $message }}"
                        @enderror @else placeholder="Nombre" @endif>

                    <input id="last_name" type="text"  name="last_name" value="{{ old('last_name') }}"
                        autocomplete="last_name" autofocus @error('last_name') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Apellido" @endif>

                    <input id="email" type="text" name="email" value="{{ old('email') }}"
                        autocomplete="email" autofocus @error('email') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Email" @endif>

                    <textarea id="mensaje"  class="mensaje-contacto" name="mensaje" value="{{ old('mensaje') }}"
                        rows="8"
                         @error('mensaje')
                           @if (isset($message))
                             placeholder="{{ $message }}"
                        @enderror
                          @else
                            placeholder="Escriba su mensaje aquí..."
                          @endif></textarea>

                      <button class="send-button" id="send-button" type="submit" >
                          <i class="far fa-paper-plane"></i> Enviar
                      </button>

                  <div class="contacto-mensaje-enviado">
                    @if (isset($mensajeEnviado))

                    <h3>{{ $mensajeEnviado }}</h3>

                    @endif

                  </div>

              </form>

            </div>
        </div>

    </section>
@endsection
