@extends('layouts/floki-template')

@section('title', 'FLOKI Deco & Design')

@section('scripts')
  <script src="{{ asset('js/changePhotoOnHover.js') }}"></script>
@endsection


@section('content')


  <div class="home-parallax">
    <div class="div-inside-home-parallax">
      <h1 data-aos="fade-in" data-aos-duration="2000">
      GET INSPIRED!
    </h1>
    </div>

</div>



  <div class="home-stripe">
    <h1>NEW COLLECTION FALL-WINTER '19 // NEW COLLECTION FALL-WINTER '19 // NEW COLLECTION FALL-WINTER '19 </h1>
  </div>


  <!-- CATEGORIAS -->
  <section class=" home-categorias">
          <article class=" categoria"data-aos="zoom-in" data-aos-duration="2000">
            <img class="img-fluid" src="images/home/link-living.jpg" alt="" />
          <a href="/shop/living">
              <div class="texto-categoria">
              <h1>Living</h1>
            </div>
        </a>
          </article>

          <article class=" categoria" data-aos="zoom-in" data-aos-duration="2000">
            <img class="img-fluid" src="images/home/link-comedor.jpg" alt="" />
          <a href="/shop/comedor">
              <div  class="texto-categoria">
              <h1>Comedor</h1>
            </div>
        </a>
          </article>

          <article class=" categoria" data-aos="zoom-in" data-aos-duration="2000">
            <img class="img-fluid" src="images/home/link-cocina.jpg" alt="" />
          <a href="/shop/cocina">
              <div class="texto-categoria">
              <h1>Cocina</h1>
            </div>
        </a>
          </article>

          <article class=" categoria" data-aos="zoom-in" data-aos-duration="2000">
            <img class="img-fluid" src="images/home/link-habitacion.jpg" alt="" />
          <a href="/shop/dormitorio">
              <div class="texto-categoria">
              <h1>Dormitorio</h1>
            </div>
        </a>
          </article>

          <article class="categoria" data-aos="zoom-in" data-aos-duration="2000">
            <img class="img-fluid" src="images/home/link-bath.jpg" alt="" />
          <a href="/shop/bath">
              <div class="texto-categoria">
              <h1>Baño</h1>
            </div>
        </a>
          </article>

          <article class="categoria" data-aos="zoom-in" data-aos-duration="2000">

                  <img class="img-fluid" src="images/home/link-oficina.jpg" alt="" />
                <a href="/shop/homeoffice">
                    <div class="texto-categoria">
                    <h1>home office</h1>
                  </div>
              </a>
          </article>

  </section>

  <div class="home-stripe">
    <h1>NEW COLLECTION FALL-WINTER '19 // NEW COLLECTION FALL-WINTER '19 // NEW COLLECTION FALL-WINTER '19 </h1>
  </div>

{{-- productos destacados --}}

<div class="productos-top-title">
  <hr>
  <h1>Los más vendidos</h1>

</div>

  <section class="productos-top">
    @foreach ($topProducts as $product)

      <article class="producto-top js-img-hover">
        <div class="producto-top-photo">

          @foreach ($product->productPhotos as $productPhoto)
            <img  class="productPhotosHover" class="img-fluid" src="/uploads/product_photos/{{$productPhoto->filename}}"
                        alt="">
          @endforeach


        </div>
        <h2>{{ $product->name }}</h2>
        <h3>${{ $product->price }}</h3>

        <a href="/product/{{ $product->id }}">Ver más</a>
      </article>
    @endforeach
  </section>



@endsection
