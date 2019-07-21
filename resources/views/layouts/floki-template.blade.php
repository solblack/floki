<!DOCTYPE html>
<html>
{{-- lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="image_src" href="{{ asset('images/Fscreenshot1.jpg') }}" />

    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!--Google-->
    <link href="https://fonts.googleapis.com/css?family=Lusitana|Roboto:300,400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon_floki') }}" />

    <!--AOS Stylesheets-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--Floki's Stylesheets-->
    <link rel="stylesheet" href="{{ asset('css/style-general.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}" />


</head>

<body>
    <p class="marquee">
        <span>
            Registrate y obtené 15% off en tu primera compra // Envíos gratis en
            compras superiores a $1000 // Llevá 3 o mas unidades del mismo producto
            con 20% off
        </span>
    </p>

    <header>

        <div class="header-container">
            {{-- menu login - register - cart --}}
            <div class="user-navbar">
                <nav class="navbar navbar-expand-lg">

                    @if(Request::path()!=="cart" && Request::path()!=="checkoutGuest" &&
                    Request::path()!=="checkoutUser")
                    <div class="nav-item shopping-cart dropdown">
                        @auth

                        @php
                        $carts = \App\Cart::where('user_id', Auth::user()->id)->get();
                        $precioTotal = 0;
                        $cantidadProductos = 0;
                        foreach ($carts as $cart) {
                        $cantidadProductos += $cart->quantity;
                        $precioTotal += $cart->product->price * $cart->quantity;

                        }
                        @endphp

                        <a class=" dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if(count($carts)!==0)
                            <p>{{ $cantidadProductos }} Productos</p>
                            @endif
                        </a>

                        @elseif (Session::has('cart'))
                        @php
                        $cantidadProductos = 0;
                        $precioTotal = 0;
                        foreach (Session::get('cart') as $cartId => $product) {
                        $cantidadProductos += $product['cantidad'];
                        $precioTotal += $product['price'] * $product['cantidad'];
                        }
                        @endphp
                        <a class=" dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p>{{ $cantidadProductos }} Productos</p>
                        </a>
                        @endauth

                        <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart "></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">

                       @if(Auth::check() && count($carts)>0)

                            <ul class="cart-menu dropdown-item">
                                @foreach($carts as $cart)
                                <li>
                                    {{ $cart->quantity }} x {{ $cart->product->name}}
                                    ${{ $cart->product->price * $cart->quantity}}
                                </li>
                                @endforeach
                                <li class="li-cart-total">
                                    Total: ${{ $precioTotal }}
                                </li>
                                <li class="li-cart">
                                    <button>
                                        <a href="/cart">Ver carrito</a>
                                    </button>
                                </li>
                            </ul>

                            @elseif (Session::has('cart'))
                            <ul class="cart-menu dropdown-item">
                                @foreach (Session::get('cart') as $cartId => $product)
                                <li>
                                    {{ $product["cantidad"] }}x {{  $product["name"]}}
                                    ${{ $product["price"] * $product["cantidad"] }}
                                </li>
                                @endforeach
                                <li class="li-cart-total">
                                    Total: ${{ $precioTotal }}
                                </li>
                                <li class="li-cart">
                                    <button>
                                        <a href="/cart">Ver carrito</a>
                                    </button>
                                </li>
                            </ul>
                            @else
                            <ul class="navbar-nav">
                                <li class="dropdown-item">
                                    No hay productos en el carrito
                                </li>
                            </ul>

                            @endauth
                        </div>
                    </div>
                    @endif

                    @if (Route::has('login'))
                    <div class="dropdown dropdown-user-menu">
                        @auth
                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <i class="fas fa-user-circle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <ul class="navbar-nav">
                                <li class="dropdown-item">
                                    <a class="nav-link" href="/profile">Mi perfil</a>
                                </li>
                                <li class="dropdown-item">
                                    <form class="" action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" name="" class="nav-link">Log out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        @else

                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <i class="far fa-user-circle"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <ul class="navbar-nav">
                                <li class="dropdown-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                </li>
                                <li class="dropdown-item">
                                    @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Sign in</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        @endauth
                    </div>

                    <div class="no-dropdown-user-menu">
                        @auth
                        <ul class="navbar-nav">
                            <li class="">
                                <a class="nav-link" href="/profile">Mi perfil</a>
                            </li>
                            <li class="">
                                <form class="" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" name="" class="nav-link">Log out</button>
                                </form>

                            </li>
                        </ul>
                        @else

                        <ul class="navbar-nav">
                            <li class="">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                            <li class="">
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Sign in</a>
                                @endif
                            </li>
                        </ul>
                        @endauth
                    </div>
                    @endif

                </nav>
            </div>


            {{-- logo header --}}
            <div class="header-logo">
                <a href="/"><img src="{{ asset('images/logo2.png') }}" alt="Logo Floki" /></a>
            </div>

            {{-- main menu large screen + search --}}
            <div class="main-navbar main-menu-large-screen">
                <nav class="navbar navbar-expand-lg menu-floki">

                    <ul class="navbar-nav mr-auto menu-floki-links">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/shop">Todas las categorias</a>

                                @foreach ($categories as $category)
                                @if ($category->is_main)
                                <a class="dropdown-item" href="/shop/{{ $category->url }}">{{ $category->name }}</a>
                                @endif
                                @endforeach


                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/inspiracion">Inspiración</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/nosotros">Sobre Flöki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacto">Contacto</a>
                        </li>
                    </ul>

                    <ul class="search-menu-large-screen">
                        <li>
                            <form class="search formu-inline" action="/search" method="get">
                                <input class="form-control" type="text" name="search" placeholder="Search" />
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>

                            </form>
                        </li>
                    </ul>

                </nav>
            </div>

            {{-- main menu mobile + search --}}
            <div class="main-navbar dropdown dropdown-collapse main-menu-small-screen">
                <nav class="navbar navbar-expand-lg ">
                    <button class="navbar-toggler btn btn-menu" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                        aria-label="Toggle navigation">

                        <i class="fas fa-bars"></i>
                    </button>


                    <ul class="dropdown-menu menu-floki-dropdown
                 menu-floki-links-small-screen" id="dropdownMenuButton">
                        <li class="dropdown-item ">
                            <a class="nav-link" href="#shop" data-toggle="collapse" data-target="#shop" role="button"
                                aria-controls="shop" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="collapse nav-item" id="shop">

                              <li>
                                  <a href="/shop">Todas las categorias</a>
                              </li>

                                @foreach ($categories as $category)
                                @if ($category->is_main)
                                <li>
                                    <a href="/shop/{{ $category->url }}">{{ $category->name }}</a>
                                </li>
                                @endif
                                @endforeach


                            </ul>
                        </li>
                        <li class="dropdown-item nav-item">
                            <a class="nav-link" href="/inspiracion">Inspiración</a>
                        </li>
                        <li class="dropdown-item nav-item">
                            <a class="nav-link" href="/nosotros">Sobre Flöki</a>
                        </li>
                        <li class="dropdown-item nav-item">
                            <a class="nav-link" href="/contacto">Contacto</a>
                        </li>

                        <li>
                            <form class="dropdown-item search formu-inline" action="/search" method="get">
                                <input class="form-control" type="text" name="search" placeholder="Search" />
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>

                            </form>
                        </li>
                    </ul>

                </nav>
            </div>



        </div>

    </header>
    <hr class="hr-header">

    <body>


        <main class="main-content">
            @yield('content')
        </main>


    </body>
    <footer class="main-footer">


        <div class="footer-menu">
            <ul class="footer-shop ">
                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        shop
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        @if ($category->is_main)
                        <a class="dropdown-item" href="/shop/{{ $category->url }}">{{ $category->name }}</a>

                        @endif
                        @endforeach

                        <a class="dropdown-item" href="/shop">Todas las categorias</a>
                    </div>
                </li>
            </ul>
        </div>


        <div class="footer-social">
            <h3>follow us!</h3>
            <div>
                <a href="http://facebook.com" target="_blank"><i class="fab fa-facebook"></i> </a>
                <a href="http://instagram.com" target="_blank"><i class="fab fa-instagram"></i> </a>
                <a href="http://plus.google.com" target="_blank"><i class="fab fa-google-plus"></i></a>
                <a href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i> </a>
            </div>
        </div>

        <div class="footer-list">
            <ul>
                <li><a href="/faq#ordenes">órdenes</a></li>
                <li><a href="/faq#envios">envíos y devoluciones</a></li>
                <li><a href="/faq#faq">f.a.q</a></li>
                <li><a href="/faq#privacidad">politica de privacidad</a></li>
            </ul>
        </div>

    </footer>

    <!--  scripts de Bootstrap-->

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!--  scripts de AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    <!--  scripts de Javascript-->
    <script type="text/javascript" src="{{ asset('js/floki.js') }}"> </script>
    @yield('scripts')


</body>

</html>
