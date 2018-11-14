<?php

    //validar datos
    $name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
    $email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
    $phone = (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
    $message = (isset($_POST['message'])) ? trim($_POST['message']) : '';
    
    $val_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $val_phone = '/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/';

    //comprobar si se ha pulsado ya el boton de registro o si se llega al formulario desde otra aplicacion
		if(isset($_POST['submit']) && $_POST['submit'] =='Enviar') {
			
      $errors = array();

      if($name == '') {
				$errors[] = 'El campo nombre no puede quedar vacio';
      }
      
      if($email == '') {
				$errors[] = 'El campo correo electrónico no puede quedar vacio';
			}elseif(!preg_match($val_email, $email)){
				$errors[] = 'El campo correo electrónico no es correcto';
      }

      if($phone == '') {
				$errors[] = 'El campo Teléfono no puede quedar vacio';
			}elseif(!preg_match($val_phone, $phone)){
				$errors[] = 'El campo Teléfono no es correcto';
      }
      
      if($message == '') {
				$errors[] = 'El campo nombre no puede quedar vacio';
      }

      if(count($errors) > 0) {
				echo 'Debe revisar los siguientes errores en el formulario</br>';
				foreach($errors as $error) {
					echo $error . '</br>';
				}
			} else {
        $to_address = 'josebaml@hotmail.com';
        $from_address = 'info@lacasadelhispano.com';
        $subject = 'Mensaje La casa Del Hispano';
        $message = $message;
        //$headers = array();
        $headers = 'MIME-Version: 1.0\n';
        $headers .= 'Content-type: text/html; charset = iso-8859-1\n';
        //$headers[] = 'Content-Transfer-Encoding: 7bit';
        $headers .= 'From: ' . $from_address;
        $success = mail($to_address, $subject, $message, $headers);

        /***** Crear un script javascript de aviso del envío realizado *****/
        if($uccess){
          //Mensaje de envío correcto.
        }else{
          //Mensaje de envío erroneo.
        }
      }
    
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>La casa del hispano</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/lightbox.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/lightbox-plus-jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <!-- Para los métodos de validación integramos este script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.header__menu-toggle').click(function(){
        $(this).toggleClass('open');
        $('.nav').toggleClass('nav--hidden');
      });
        /* Nav Menú */
        $('.nav__a').click(function(e){  
        $('.nav').toggleClass('nav--hidden'); 
        $('.header__menu-toggle').toggleClass('open');    
        e.preventDefault();   //evitar el eventos del enlace normal
        var strAncla=$(this).attr('href'); //id del ancla
        $('body,html').stop(true,true).animate({        
        scrollTop: $(strAncla).offset().top
        },1000);
      });
        
        /* Header Menú */
        $('.header__a').click(function(e){     
        e.preventDefault();   //evitar el eventos del enlace normal
        var strAncla=$(this).attr('href'); //id del ancla
        $('body,html').stop(true,true).animate({        
        scrollTop: $(strAncla).offset().top
        },1000);

      });

        /* Logo */
        $('header__logo > a').click(function(e){       
        e.preventDefault();   //evitar el eventos del enlace normal
        var strAncla=$(this).attr('href'); //id del ancla
        $('body,html').stop(true,true).animate({        
        scrollTop: $(strAncla).offset().top
        },1000);
      });
      
      /* Validacion */
      $("#formulario_contacto").validate({
        rules:{
          name: {
            required: true,
          },
          tel:{
            required: true,
            minlength: 9,
            digits: true
          },
          email:{
            required: true,
            email: true
          },
          message:{
            required: true
          }
        }
      });
      $.extend( $.validator.messages, {
        required: "Este campo es obligatorio.",
        email: "Por favor, escriba una dirección de correo válida.",
        digits: "Por favor, escriba sólo dígitos.",
        maxlength: $.validator.format( "Por favor, no escriba más de {0} caracteres." ),
        minlength: $.validator.format( "Por favor, no escriba menos de {0} caracteres." )

      });
  });
  </script>
</head>
<body>
  <section id="hero" class="hero">
    <header class="header">
      <h1 class="header__logo"><a href="#hero">Logo</a></h1>
      <div class="header__menu-toggle">
          <span></span>
      </div>
      <nav class="header__nav">
        <ul class="header__ul">
            <li class="header__li"><a href="#hero" class="header__a">Inicio</a></li>
            <li class="header__li"><a href="#services" class="header__a">Servicios</a></li>
            <li class="header__li"><a href="#gallery" class="header__a">Galeria</a></li>
            <li class="header__li"><a href="#contact_section" class="header__a">Contacto</a></li>
          </ul>
      </nav>
    </header>
    <nav class="nav">
      <ul class="nav__ul">
          <li class="nav__li"><a href="#hero" class="nav__a">Inicio</a></li>
          <li class="nav__li"><a href="#services" class="nav__a">Servicios</a></li>
          <li class="nav__li"><a href="#gallery" class="nav__a">Galeria</a></li>
          <li class="nav__li"><a href="#contact_section" class="nav__a">Contacto</a></li>
        </ul>
    </nav>
    <div class="modal">
      <p class="modal__text-first">
        La <strong>Casa del Hispano</strong> destaca por su decoración sencilla y luz natural que, junto con su diseño, crea un ambiente relajado y acogedor, intentando imitar el estilo de las conocidas <strong>domus de la antigua Roma.</strong>
      </p>
      <p class="modal__text-second">
        Visita las instalacones de <strong>La casa del hispano</strong> en vídeo, <a href="https://www.youtube.com/watch?v=Y7rz-koNu6o" class="modal__video">aquí.</a>
      </p>
    </div>
  </section>

  <section id="services" class="domus">
    <h2 class="domus__title">Servicios</h2>
    <div class="domus__container">
      <div class="map">
        <div class="map__circle">
          <img src="images/iconMap.svg" alt="icono mapa" class="map__image">
        </div>
        <p class="map__text">
          Desde Madrid por la A-I dirección Burgos, nos desviamos en el Km 100 dirección a Cerezo de Abajo. En el primer desvío a la izquierda (antes de pasar la gasolinera Petronor), tomamos la C-112 dirección a Cuellar. <br>
          Duruelo está a 4 km. Desviandonos a la derecha en dirección al pueblo entramos en la Urbanización de Sotomosila y avanzamos en línea recta unos 800 metros. El alojamiento se encuentra en la penúltima bocacalle a la izquierda, <strong>calle E parcela 116.</strong>
        </p>
      </div>
      <div class="house">
        <div class="house__circle">
          <img src="images/iconHouse.svg" alt="icono casa" class="house__image">
        </div>
        <p class="house__text">
          La planta baja consta de 3 habitaciones (h1: 2 camas, h2: 2 camas y h3: 3 camas), salón con cocina americana de 33 m2 e hilo musical, que comunica con el porche de 20 m2 y el jardín de 350. Baño completo también con hilo musical.<br>
          La primera planta tiene 1 habitación de 33m2 con hilo musical, 5 camas y capacidad para dormir 7 personas en camas supletorias, baño completo y terraza-mirador de 15 m2.<br>
          Todos las habitaciones tienen armarios empotrados y ventanas adaptadas para conservar el calor con las bajas temperaturas. La calefacción funciona por suelo radiante.
        </p>
      </div>
      <div class="tourism">
        <div class="tourism__circle">
          <img src="images/iconTourism.svg" alt="icono Turismo" class="tourism__image">
        </div>
        <p class="house__text">
          Alojamiento turístico a solo una hora de Madrid, en el maravilloso pueblo de Duruelo, en el nordeste de Segovia, rodeado de montañas y parajes entrañables en contacto con la naturaleza, ideal para practicar senderismo en los parques naturales de Hoces del río Duratón, Hoces del río Riaza, esquiar en la Pinilla, o pasear por pueblos con encanto como Sepúlveda, Riaza, Pedraza o Ayllón.<br>
          En Duruelo hay pistas de pádel, frontón vasco, mesas de ping-pong, y pista de baloncesto y futbol; así como zonas de columpios para niños.<br>
          <strong>Un lugar Ideal para alojarse en fines de semana, puentes y vacaciones.</strong>
        </p>
      </div>
    </div>
  </section>

  <section id="gallery" class="gallery">
    <h2 class="gallery__title">Galería</h2>
    <p class="gallery__text">
      El termino <strong>domus</strong> se utilizaba para denominar a una vivienda romana particular donde vivía una sola familia y se caracterizaban por ser cómodas, amplias, elegantes, ventiladas y soleadas. Una casa señorial urbana para familias acomodadas con todos los lujos de la época.
    </p>
    <div class="gallery__container">
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano1.jpg" data-lightbox="example-set">
            <img src="images\casaHispano1.jpg" alt="imagen galeria" class="gallery__img"/>
          </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano2.jpg" data-lightbox="example-set">
          <img src="images\casaHispano2.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano3.jpg" data-lightbox="example-set">
          <img src="images\casaHispano3.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano4.jpg" data-lightbox="example-set">
          <img src="images\casaHispano4.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano5.jpg" data-lightbox="example-set">
          <img src="images\casaHispano5.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano6.jpg" data-lightbox="example-set">
          <img src="images\casaHispano6.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano7.jpg" data-lightbox="example-set">
          <img src="images\casaHispano7.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano8.jpg" data-lightbox="example-set">
          <img src="images\casaHispano8.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano9.jpg" data-lightbox="example-set">
          <img src="images\casaHispano9.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano10.jpg" data-lightbox="example-set">
          <img src="images\casaHispano10.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano11.jpg" data-lightbox="example-set">
          <img src="images\casaHispano11.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano12.jpg" data-lightbox="example-set">
          <img src="images\casaHispano12.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano13.jpg" data-lightbox="example-set">
          <img src="images\casaHispano13.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano14.jpg" data-lightbox="example-set">
          <img src="images\casaHispano14.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano15.jpg" data-lightbox="example-set">
          <img src="images\casaHispano15.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano16.jpg" data-lightbox="example-set">
          <img src="images\casaHispano16.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano17.jpg" data-lightbox="example-set">
          <img src="images\casaHispano17.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
        <div class="gallery__item">
          <a class="example-image-link" href="images\casaHispano18.jpg" data-lightbox="example-set">
          <img src="images\casaHispano18.jpg" alt="imagen galeria" class="gallery__img"/>
        </a>
        </div>
      </div>
  </section>
  <section id="contact_section" class="contact">
    <h2 class="contact__title">Contacto</h2>
    <p class="contact__text">
    	Para consultar la disponibilidad del alojamiento o cualquier duda, contacta con nosotros.
    </p>
    <ul class="contact__details">
      <li class="contact__location">Calle E 116, Duruelo</li>
      <li class="contact__phone">629 948 444</li>
      <li class="contact__email"><a href="#" class="contact__a">Ricobju.jrb@gmail.com</a></li>
    </ul>
    <div class="form">
      <div class="form__map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000.453246016908!2d-3.6473986844298043!3d41.23368401347217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4407432dffbf01%3A0x731644d15875eeb4!2sCalle+E%2C+116%2C+40312+Duruelo%2C+Segovia!5e0!3m2!1ses!2ses!4v1524560109204" width="800" height="800" frameborder="0" style="border:0" allowfullscreen class="form__iframe"></iframe>
      </div>
      <form class="form__contact" action="#" method="POST" id="formulario_contacto">
        <input type="text" id="name" class="form__item" name="name" placeholder="Nombre Completo" required/>
        <input type="tel" id="phone" class="form__item" name="phone" placeholder="Teléfono" pattern="^[9|8|7|6]\d{8}$" title="Debe introducir un número de teléfono válido" required/>
        <input id="email" class="form__item" name="email" placeholder="Correo electrónico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Debe introducir una dirección de correo válida" required/>
        <textarea id="message" class="form__item" name="message" placeholder="Escribe tu mensaje..." rows="8" required></textarea>
        <input type="submit" name="submit" class="form__item form__submit" value="Enviar" >
      </form>
    </div>
</section>
<footer class="footer">
  <div class="footer__socials">
    <a class="footer__icon-facebook" href="">
      <img src="images/iconoFacebook.svg" width="21" height="21" alt="Icono Facebook" />
    </a>
    <a class="footer__icon-youtube" href="https://www.youtube.com/watch?v=Y7rz-koNu6o">
      <img src="images/iconoYoutube.svg" width="21" height="21" alt="Icono Youtube" />
    </a>
  </div>
  <p class="footer__email">
    <a href="mailto:josebaml@gmail.com" class="footer__email--color">© 2018 Joseba Moreno</a>
  </p>
</footer>
</body>
</html>