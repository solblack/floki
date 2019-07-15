@extends('layouts/floki-template')

@section('title', 'Inspiráte! FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/inspiracion.css') }}"/>
@endsection

@section('scripts')
<script src="{{ asset('js/inspiracion.js') }}"></script>
@endsection


@section('content')

<section class="style">

  <div class="style-parallax scandinavian">
     <div class="div-inside-style-parallax">
       <div class="style-title" data-aos="fade-in" data-aos-duration="3000">
           <h1>Scandinavian</h1>
       </div>
     </div>
  </div>

  <div class="style-text">
      <p>El estilo escandinavo o simplemente Scandi, nace en las lejanas Finlandia, Noruega, Dinamarca y Suecia. A pesar de eso, ha sido recibido con los brazos abiertos en el resto de países y continentes, convirtiéndose en el estilo más trendy durante décadas.
        Ha ido evolucionando a lo largo de estos años hasta convertirse en una decoración que apuesta por la sofisticación, sobriedad y la armonía, consiguiendo aportar la calidez necesaria para combatir las bajas temperaturas externas. Pero sin olvidar sus raíces. El estilo nórdico aprovecha los recursos naturales que le rodean, desde la luz hasta la madera, para ofrecer un resultado que enamora.</p>
      <p>La decoración nórdica es cálida, blanca, llena de personalidad y de mucha luz. La luz comunica habitaciones y logra trasladar el exterior dentro de casa. Para la noche, mejor varios puntos de luz: lámparas de techo, de pie, de sobremesa... Se trata de buscar la fusión perfecta. </p>
      <p>Las paredes en el diseño escandinavo estilo interior no deben atraer demasiado la atención, ya que sólo sirven como un fondo para el entorno. Las puertas y ventanas también deben corresponder al color principal. Los grandes espejos son una necesidad, ya sea con marcos grabados en blanco o sin marco en absoluto.</p>
      <p>Los tonos serenos, silenciosos neutrales dominan el diseño escandinavo. Sin embargo, la preferencia por los colores sobrios no significa que el diseño escandinavo carezca de vitalidad y vitalidad. Los elementos de acento como la cerámica, las alfombras, los cojines y el arte en tonos brillantes inyectan vida y carácter a los espacios. De hecho, se destacan más dramáticamente en un espacio diseñado de esta manera. El azul es un color común no neutral muy utilizado en la cultura nórdica.</p>
  </div>



  <div class="inspo-style-carousel">

    <i id="previousPhoto-scandinavian" class="fas fa-chevron-left"></i>

    <div class="div-img-scandinavian">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/1.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/2.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/3.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/4.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/5.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/6.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/7.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/8.jpg') !!}" alt="">
      <img class="photos-scandinavian" src="{!! asset('images/inspiracion/scandinavian/9.jpg') !!}" alt="">
    </div>

    <i id="nextPhoto-scandinavian" class="fas fa-chevron-right"></i>

  </div>

  <div class="style-shop">
      <button class="btn-style" type="button" name="button">
        <a href="/shop/scandinavian">SHOP BY STYLE</a>
      </button>
  </div>

</section>

<section class="style">

  <div class="style-parallax boho">
    <div class="div-inside-style-parallax">
      <div class="style-title" data-aos="fade-in" data-aos-duration="1000">
          <h1>Boho</h1>
      </div>
    </div>
  </div>

  <div class="style-text">
    <p>El estilo Boho Chic podría definirse como un estilo libre, ya que no presenta una serie de patrones o líneas a seguir, sino más bien todo lo contrario. La principal característica es que se pueden mezclar todo tipo de estilos sin preocupación alguna.
        Es decir, es un estilo con una fuerte personalidad propia. ¡Perfecto para dar rienda suelta a los gustos del decorador!
        El Boho Chic recuerda a una mezcla entre estilos vintage, étnicos, hippies, modernos y antiguos, con una gran combinación de colores, estampados y formas que originan un equilibrio fruto de la mezcla entre creatividad y elegancia.</p>
    <p>El color juega un papel muy importante en el estilo boho. Destaca la combinación de colores cálidos y tonos que recuerdan a la naturaleza. Se podría decir, que el color se configura como una manera de llevar diferentes entornos naturales a nuestro hogar.

    Podemos mezclar diferentes colores a través de los distintos accesorios de decoración, muebles e incluso pinturas de nuestras habitaciones.</p>
    <p>La decoración al estilo bohemio, antes que nada, es como una explosión de alegría y ganas de vivir, por lo que a la hora de reflejarlo en la decoración a través de los colores, las posibilidades son tan variadas como los tonos existentes, pero siempre y cuando estos sean cálidos y vibrantes, descartando los tonos neutros u opacos.</p>
    <p>Recuerda que el estilo bohemio es principalmente libre y ecléctico, por lo que puedes darle rienda suelta a tu imaginación a la hora de decorar la casa con esta divertida tendencia.</p>

  </div>


  <div class="inspo-style-carousel">

    <i id="previousPhoto-boho" class="fas fa-chevron-left"></i>

    <div class="div-img-boho">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/1.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/2.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/3.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/4.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/5.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/6.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/7.jpg') !!}" alt="">
      <img class="photos-boho" src="{!! asset('images/inspiracion/boho/8.jpg') !!}" alt="">
    </div>

    <i id="nextPhoto-boho" class="fas fa-chevron-right"></i>

  </div>

  <div class="style-shop">
      <button class="btn-style" type="button" name="button">
        <a href="/shop/boho">SHOP BY STYLE</a>
      </button>
  </div>

</section>

<section class="style">

  <div class="style-parallax shabby">
    <div class="div-inside-style-parallax">
      <div class="style-title" data-aos="fade-in" data-aos-duration="1000">
          <h1>Shabby chic</h1>
      </div>
    </div>
  </div>

  <div class="style-text">
      <p>Shabby es lo viejo y desgastado, Chic es lo bohemio y romántico: los encajes, tules y delicados tejidos. Esta tendencia, que consiste principalmente en mezclar muebles restaurados o reutilizados, además de telas usadas. Junto a elementos más modernos, es la principal característica de este estilo.</p>
      <p>Una de las claras diferencias de este estilo con el vintage es el halo romántico y femenino de las decoraciones shabby chic. Colores suaves, motivos florales, ramos, muebles de líneas redondeadas.</p>
      <p>Los tonos pastel son un clásico de este estilo decorativo, sobre todo en los textiles de los dormitorio: desde el rosa empolvado y el verde mint hasta los azules más suaves.</p>
      <p>Al natural o estampadas en textiles, vajillas o papeles pintados, las flores son un must de este estilo decorativo, en el que lo femenino y lo romántico van de la mano. Unos candeleros antiguos o envejecidos, unos marcos de fotos labrados, una composición de láminas retro... Los pequeños detalles cuentan, y mucho, para una perfecta puesta en escena shabby chic.</p>
  </div>

  <div class="inspo-style-carousel">

    <i id="previousPhoto-shabby" class="fas fa-chevron-left"></i>

    <div class="div-img-shabby">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/1.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/2.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/3.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/4.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/5.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/6.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/7.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/8.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/9.jpg') !!}" alt="">
      <img class="photos-shabby" src="{!! asset('images/inspiracion/shabby/10.jpg') !!}" alt="">            
    </div>

    <i id="nextPhoto-shabby" class="fas fa-chevron-right"></i>

  </div>


<div class="style-shop">
  <button class="btn-style" type="button" name="button">
    <a href="/shop/shabby">SHOP BY STYLE</a>
  </button>
</div>


</section>

@endsection
