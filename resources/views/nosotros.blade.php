@extends('layouts/floki-template')

@section('title', 'FLOKI Deco & Design')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/nosotros.css') }}"/>
@endsection


@section('content')


  <div class="nosotros-parallax">
    <div class="div-inside-nosotros-parallax">

      <div class="nosotros-title" data-aos="zoom-in" data-aos-duration="2000">
        <h1>Sobre FLÖKI</h1>
      </div>


      <div class="box-nosotros" data-aos="zoom-in" data-aos-duration="2000">

          <p><strong>Floki</strong> es un proyecto creado en el contexto del curso de Desarrollo web Full Stack en la escuela <a href="https://www.digitalhouse.com/" target="_blank">Digital House</a>. La idea fue desarrollar una <strong>aplicación web e-commerce</strong> desde el comienzo del curso, integrando los conocimientos que íbamos adquiriendo en cada etapa.</p>
          <p>Desde el primer momento, utilizamos la <strong>metodología Agile Scrum</strong>, y los miembros del equipo nos auto-organizamos para cumplir con cada Sprint planteado. También utilizamos el sistema de control de versiones <strong>GIT</strong>, haciendo uso de GITHUB para alojar nuestro <a href="https://github.com/beliocca/floki_laravel" target="_blank">repositorio remoto</a>.</p>
          <p>El proyecto comenzó con una maquetación realizada con <strong>HTML5</strong>, <strong>CSS3</strong> y <strong>Bootstrap</strong>. Luego utilizamos <strong>PHP</strong> nativo para implementar funcionalidades del lado del servidor, como ser: guardado de datos y validación de los formularios de Login y Registro, validar usuario logueado, listado de productos desde un archivo JSON.</p>
          <p>Posteriormente, realizamos un DER para modelar la base de datos de nuestro proyecto. Creamos la base de datos usando <strong>MYSQL</strong> y generamos la conexión a la misma utilizando la clase PDO en PHP. En esta instancia del desarrollo, implementamos el paradigma de <strong>programación orientada a objetos</strong> en el proyecto, creando primero el modelado y luego llevándolo a la práctica.</p>
          <p>Luego de haber creado el proyecto en php nativo, comenzamos a hacer uso del Framework Laravel. Por ende, migramos todo el proyecto a Laravel, creando migraciones para armar la nueva base de datos, y usando factories y seeders para testear el proyecto.</p>
          <p>En <strong>Laravel</strong>, hicimos uso de las buena prácticas de la arquitectura de desarrollo <strong>MVC</strong> (modelo-vista-controlador)</p>
          <p>Finalmente, implementamos <strong>Javascript</strong>, usando scripts propios para funcionalidades del sitio, como ser: validación de formularios del lado del cliente, carousel de fotos, cambio de fotos con los eventos mouseIn y mouseOut, entre otros. Además, hicimos uso de librerías de Jquery, AOS y bootstrap para agregar funcionalidades y efectos a la aplicación.</p>
          <p>Floki fue un proyecto integrador de mucho aprendizaje. Fue un <strong>gran proceso creativo</strong>, donde aprendimos no sólo a aplicar los conocimientos adquiridos en el curso de Digital House, sino también <strong>skills</strong> muy importantes como ser: el trabajo y la dinámica dentro de un equipo de desarrollo, la capacidad de ser autónomo y autodidácta a la hora de buscar soluciones y generar nuevas herramientas técnicas, y la resolución de conflictos de todo tipo.</p>

      </div>


      <div class="nosotros-title" data-aos="zoom-in" data-aos-duration="2000">
        <h1>El equipo de FLÖKI</h1>
      </div>

      <section class="team" data-aos="zoom-in" data-aos-duration="2000">

        <article class="team-member">
          <img src="{{ asset('images/team/belen.jpg')}}" alt="">
          <h2>María Belén Iocca</h2>

          <div class="team-member-datos">
            <h3>Desarrolladora web Full stack</h3>
            <p><a href=https://www.linkedin.com/in/mbiocca/" target="_blank"">linkedin.com/in/mbiocca</a></p>
            <p><a href="https://github.com/beliocca" target="_blank">github.com/beliocca</a></p>
            <p>mariabeleniocca@gmail.com</p>
          </div>

        </article>

        <article class="team-member">
          <img src="{{ asset('images/team/sol.jpg') }}" alt="">
          <h2>Sol Latorre Beorlegui</h2>

          <div class="team-member-datos">
            <h3>Desarrolladora web Full stack</h3>
            <p><a href="https://www.linkedin.com/in/solb/" target="_blank">linkedin.com/in/solb</a></p>
            <p><a href="https://github.com/solblack" target="_blank">github.com/solblack</a></p>
            <p>solbeor@gmail.com</p>
          </div>
        </article>

      </section>

      {{-- <h1 data-aos="fade-in" data-aos-duration="2000">
      GET INSPIRED!
    </h1> --}}
    </div>

</div>


@endsection
