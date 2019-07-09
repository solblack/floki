@extends('layouts/floki-template')

@section('title', '¡Contactános! - FLOKI Deco & Design')


@section('content')

  <section class="section-contacto">
      <div class="register">
          <!--Imagen-->
          <article class="art1 d-none d-lg-block">
              <img src="images/living2.jpg" alt="living2" width="100%" height="859px" />
          </article>
          <!--Form-->
          <article class="art2">
              <form class="formulario" action="/contacto" method="post">
                @csrf

                @if (Session::has('flash_message'))
                  <p class="contactanos">
                    {{ Session::get('flash_message') }}
                  </p>
                  @else
                    <p class="contactanos">
                        ¡Contactanos!
                    </p>
                @endif

                  <p>
                    <input id="name" type="text" class="userform" name="name" value="{{ old('name') }}"
                        autocomplete="name" autofocus @error('name') @if (isset($message)) placeholder="{{ $message }}"
                        @enderror @else placeholder="Nombre" @endif>
                  </p>
                  <p>
                    <input id="last_name" type="text" class="userform" name="last_name" value="{{ old('last_name') }}"
                        autocomplete="last_name" autofocus @error('last_name') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Apellido" @endif>
                  <p>
                    <input id="email" type="text" class="userform" name="email" value="{{ old('email') }}"
                        autocomplete="email" autofocus @error('email') @if (isset($message))
                        placeholder="{{ $message }}" @enderror @else placeholder="Email" @endif>
                  </p>
                  <p>
                    <textarea id="mensaje"  class="mensaje-contacto" name="mensaje" value="{{ old('mensaje') }}"
                        rows="8" cols="60"
                         @error('mensaje')
                           @if (isset($message))
                             placeholder="{{ $message }}"
                        @enderror
                          @else
                            placeholder="Escriba su mensaje aquí..."
                          @endif></textarea>
                  </p>

                  <p>
                      <button id="send-button" type="submit" >
                          <i class="far fa-paper-plane"></i> Enviar
                      </button>
                  </p>

                  <div class="contacto-mensaje-enviado">
                    @if (isset($mensajeEnviado))

                    <h3>{{ $mensajeEnviado }}</h3>

                    @endif

                  </div>

              </form>


          </article>
      </div>
  </section>
  <br>
@endsection
