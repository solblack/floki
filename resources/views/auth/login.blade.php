@extends('layouts/floki-template')

@section('title', 'Login - FLOKI Deco & Design')


@section('content')
  <section class="section-login">
      <div class="login">
          <!--Imagen-->
          <article class="art1 d-none d-lg-block">
              <img src="images/home-office.jpg" alt="living" width="100%" height="859px" />
          </article>
          <!--Form-->
          <article class="art2">
              <form class="formulario-login" action="{{ route('login') }}" method="post">
                  @csrf

                  <p class="ingresa">
                      ¡Ingresá!
                  </p>
                  <div class="ingresarcon">
                      <article class="ing">
                          <i class="fab fa-google-plus-g"></i>
                      </article>
                      <article class="ing">
                          <i class="fab fa-facebook-f"></i>
                      </article>
                      <article class="ing">
                          <i class="fab fa-twitter"></i>
                      </article>
                  </div>

                  <div class="o-wrap">
                      <hr />
                      <i class="far fa-circle"></i>
                  </div>


                  <p>
                    <input id="email" type="email" class="userform" name="email" value="{{ old('email') }}"
                      autocomplete="email" autofocus

                      @error('email')
                         @if (isset($message))
                       placeholder="{{ $message }}"
                         @enderror
                       @else
                         placeholder="Email"
                     @endif
                     >
                  </p>

                  <p>
                    <input id="password" type="password" class="userform" name="password"


                      @error('password')
                         @if (isset($message))
                       placeholder="{{ $message }}"
                         @enderror
                       @else
                         placeholder="Password"
                     @endif
                     >
                  </p>

                    @error('email')
                       @if (isset($message))
                       <p class="tyc">
                    {{ $message }}
                </p>
                       @enderror
                     {{-- @else
                       no hay errores de email --}}
                   @endif

                  <p>
                    <input class="tyc" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label for="remember">Recordarme</label>

                  </p>

                  <p>
                    <button id="send-button" type="submit" name="button" >
                        <i class="far fa-paper-plane"></i> Enviar
                    </button>
                  </p>

                  <div class="">
                    @if (Route::has('password.request'))
                        <a class="tyc" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                  </div>

                  </div>


              </form>
          </article>
      </div>
  </section>
  <br>
@endsection
