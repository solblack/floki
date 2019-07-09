@extends('layouts/floki-template')

@section('title', 'Shop - FLOKI Deco & Design')

@section('scripts')
<script src="{{ asset('js/changePhotoOnHover.js') }}"></script>
@endsection


@section('content')

<div class="contenedor-shop">
    <div class="menu-shop">
        <ul class="sticky-menu-shop">
            <p>Categorias</p>
            <ul>
                @foreach ($categories as $category)
                  @if ($category->is_main)
                    <li>
                        <a href="/shop/{{ $category->url }}">{{ $category->name }}</a>
                    </li>
                  @endif
                @endforeach
                    <li >
                      <a  href="/shop">Todas las categorias</a>
                    </li>
            </ul>

            <p>Ordenar por precio</p>
            <ul>
                <li>
                    <a href="/shop/order/asc">Menor a mayor</a>
                </li>
                <li>
                    <a href="/shop/order/desc">Mayor a menor</a>
                </li>
                <li>
                    <a href="/shop/order/5000">Hasta $5.000</a>
                </li>
            </ul>

        </ul>

    </div>

    <div class="menu-shop-mobile">

          <hr>
          <span class="">
              <a class="dropdown"
                  href="#"
                  id="shopCategorias"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
              >Categorias</a>
                <ul class="dropdown-menu " aria-labelledby="shopCategorias">
                    @foreach ($categories as $category)
                      @if ($category->is_main)
                        <li class="dropdown-item">
                            <a href="/shop/{{ $category->url }}">{{ $category->name }}</a>
                        </li>
                      @endif
                    @endforeach
                        <li  class="dropdown-item">
                          <a  href="/shop">Todas las categorias</a>
                        </li>
                </ul>
          </span>
          <span class="">
              <a class=" dropdown"
                href="#"
                id="ordenarPorPrecio"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
            Ordenar por precio</a>
            <ul class="dropdown-menu " aria-labelledby="ordenarPorPrecio">
                <li class="dropdown-item">
                    <a href="/shop/order/asc">Menor a mayor</a>
                </li>
                <li class="dropdown-item">
                    <a href="/shop/order/desc">Mayor a menor</a>
                </li>
                <li class="dropdown-item">
                    <a href="/shop/order/5000">Hasta $5.000</a>
                </li>
            </ul>


        </span>



    </div>

    <div class="contenedor-productos">
        <section class="section-productos">
            @foreach ($products as $product)

              <article class="producto js-img-hover">
                      <div id="photo-shop" >
                        @foreach ($product->productPhotos as $productPhoto)
                          <img  class="productPhotosHover" class="img-fluid" src="/uploads/product_photos/{{$productPhoto->filename}}"
                                      alt="">
                        @endforeach
                      </div>
                  <h2>{{ $product->name }}</h2>

                  <h3>${{ $product->price }}</h3>
{{-- @foreach ($product->categories as $category)
    <p>{{ $category->name }}</p>
@endforeach --}}

                  <a href="/product/{{ $product->id }}">Ver más!</a>

                  <form class="" action="/addtocart" method="post">
                    @csrf


                   <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="cantidad" value=1>
                   <input type="hidden" name="name" value="{{ $product->name }}">
                   <input type="hidden" name="price" value="{{ $product->price }}">
                   <input type="hidden" name="photo" value="{{$product->productPhotos->first()->filename }}">

                   <button type="submit" name="button">COMPRAR</button>
                  </form>
              </article>
              @endforeach
          </section>

          <div class="pagination-productos">
              {{$products->appends($_GET)->links()}}
          </div>

    </div>



</div>
</section>
@endsection
