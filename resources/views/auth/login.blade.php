@extends('layouts/floki-template')

@section('title', 'Login - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/forms.css') }}"/>
@endsection


@section('content')
  <section class="form-container">
    <div class="div-inside-container">

      <div class="form-box" data-aos="zoom-in" data-aos-duration="1000">

        <h1 class="form-title">
            ¡Ingresá!
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


          <form class="formulario-login" action="{{ route('login') }}" method="post">
                  @csrf

                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                      autocomplete="email" autofocus

                      @error('email')
                         @if (isset($message))
                       placeholder="{{ $message }}"
                         @enderror
                       @else
                         placeholder="Email"
                     @endif
                     >


                    <input id="password" type="password"  name="password"


                      @error('password')
                         @if (isset($message))
                       placeholder="{{ $message }}"
                         @enderror
                       @else
                         placeholder="Password"
                     @endif
                     >

              <div class="opciones2">
                    @error('email')
                       @if (isset($message))
                  <p class="chechbox-text">
                    {{ $message }}
                  </p>
                       @enderror
                     {{-- @else
                       no hay errores de email --}}
                   @endif

              </div>


              <div class="opciones" >
                    <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="checkbox-text" for="remember">Recordarme</label>
              </div>



                    <button class="send-button" id="send-button" type="submit" name="button" >
                        <i class="far fa-paper-plane"></i> Enviar
                    </button>


                  <div class="opciones">
                    @if (Route::has('password.request'))

                        <p class="checkbox-text">
                          <a href="{{ route('password.request') }}">
                              {{ __('Olvidaste tu contraseña?') }}
                          </a>
                        </p>

                    @endif
                  </div>




              </form>
            </div>
        </div>
  </section>

@endsection
