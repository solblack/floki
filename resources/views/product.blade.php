@extends('layouts/floki-template')

@section('title', 'Shop - FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/producto.css') }}"/>
@endsection

@section('scripts')
<script src="{{ asset('js/producto.js') }}"></script>
@endsection


@section('content')


<div class="contenedor-producto">

        <div class="fotos-producto">
             <div class="photo-product-main" >
               <i id="previousPhoto" class="fas fa-chevron-left"></i>
               <div class="div-img-producto">
               @foreach ($product->productPhotos as $productPhoto)
                 <img  class="productPhotos" src="/uploads/product_photos/{{$productPhoto->filename}}"
                             alt="">
               @endforeach
             </div>

              <i id="nextPhoto" class="fas fa-chevron-right"></i>
             </div>

        </div>

         <div class="datos-producto">
             <h1>{{ $product->name }}</h1>

             <h2>${{ $product->price }}</h2>

             <h3>Detalles del producto</h3>
             <p>{{ $product->description }}</p>

             <p>STOCK: {{ $product->stock }} unidades.</p>

             <hr class="tag-line">

             <div class="tags-categorias">

               @foreach ($product->categories as $category)
                   <button class="btn-tag" type="button" name="button"># {{ $category->name }}</button>
               @endforeach
             </div>

             <form class="form-producto" action="/addtocart" method="post">
               @csrf

               <div class="cantidad">
                 <h3>Cantidad: </h3>
                 <select name="cantidad">
                   @if ($product->stock > 10)
                     <option value="1" selected>1</option>
                     @for ($i=2; $i < 11; $i++)
                       <option value="{{$i}}">{{$i}}</option>
                     @endfor

                  @elseif ($product->stock > 0 && $product->stock <= 10) {
                    <option value="1" selected>1</option>
                     @for ($i=2; $i < $product->stock ; $i++)
                       <option value="{{$i}}">{{$i}}</option>
                     @endfor
                   }

                 @else{
                   <option value="0" selected>Sin stock</option>
                 }
                   @endif



                 </select>

               </div>
               @if (isset($currentUser))
               <input type="hidden" name="user_id" value={{$currentUser->id}}>
               @endif
              <input type="hidden" name="id" value="{{ $product->id }}">
              <input type="hidden" name="name" value="{{ $product->name }}">
              <input type="hidden" name="price" value="{{ $product->price }}">
              <input type="hidden" name="photo" value="{{$product->productPhotos->first()->filename }}">

              <button class="btn-comprar" type="submit" name="button">COMPRAR</button>
             </form>


             {{-- @foreach ($product->categories as $category)
                 <p>{{ $category->name }}</p>
             @endforeach --}}

         </div>

</div>


{{-- productos recomendados dentro de la categoria --}}
<div class="producto-recomendaciones">
  <div class="te-puede-gustar">
    <hr>
    <h1>También te puede gustar</h1>
  </div>

  <section class="productos-recomendados">
    @foreach ($productsRecomendados as $product)

      <article class="producto-recomendado">

        <div class="producto-recomendado-photo">
            <a href="/product/{{ $product->id }}">
                @foreach ($product->productPhotos as $productPhoto)
                <img  class="productPhotosHover" class="img-fluid" src="/uploads/product_photos/{{$productPhoto->filename}}"
                              alt="">
                @endforeach
            </a>
        </div>
        <h2><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h2>
        <h3><a href="/product/{{ $product->id }}">${{ $product->price }}</a></h3>

        <a class="verMas" href="/product/{{ $product->id }}">Ver más</a>

        <hr class="tag-line">

        <div class="tags-categorias">

          @foreach ($product->categories as $category)
              <button class="btn-tag" type="button" name="button"># {{ $category->name }}</button>
          @endforeach
        </div>
        {{-- @foreach ($product->categories as $category)
            <p>{{ $category->name }}</p>
        @endforeach --}}
      </article>
    @endforeach
  </section>

</div>


@endsection
