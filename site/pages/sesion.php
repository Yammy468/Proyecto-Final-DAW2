<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Inicio</title>

  <!-- Exportar la CABECERA de la página -->
  <?php include("template/header.php"); ?>
</head>

<?php
// Conectamos a la base de datos del fichero funciones.inc
include("../config/funciones.inc");

// Recuperamos la información de la sesión
session_start();

// Comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) {
  header('Location: login.php'); 
} else {
  date_default_timezone_set('Europe/Madrid');
  $_SESSION['fecha'] = date("d/m/Y \a \l\a\s H:i");
}

// Mensaje de Pago Exitosa
if(isset($_GET['mensaje'])) {
  // Escapar el mensaje para evitar ataques XSS
  $mensaje = htmlspecialchars($_GET['mensaje']);
  // Mostrar el mensaje de alerta
  echo '<script>alert("'.$mensaje.'")</script>';
}
?>

<body>
<div class="page">
    <!-- ======= Header ======= -->
    <header class="section page-header">
      <!-- Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
          data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
          data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
          data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
          data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <!-- Navbar Toggle en la Derecha -->
          <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
            <span></span>
          </div>
          <div class="rd-navbar-aside-outer">
            <div class="rd-navbar-aside">
              <div class="rd-navbar-panel">
                <!-- Icono de Menu -->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- Imagen/Marca Navbar -->
                <div class="rd-navbar-brand">
                  <!-- Logo -->
                  <a href="sesion.php"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
                </div>
              </div>
              <!-- Contenido del Navbar Derecho -->
              <div class="rd-navbar-aside-right rd-navbar-collapse">
                <ul class="rd-navbar-corporate-contacts">
                  <li>
                    <div class="unit unit-spacing-xs">
                      <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                      <div class="unit-body">
                        <p>Lunes - Viernes:</p>
                        <p><span>09:00 — 20:00</span></p>
                        <p>Sábado:</p>
                        <p><span>09:30 — 14:30</span></p>
                      </div>
                    </div>
                  </li>

                  <li>
                    <div class="unit unit-spacing-xs">
                      <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                      <div class="unit-body">
                        <a class="link-phone" href="tel:#">+34 907 98 00 32</a>
                      </div>
                    </div>
                  </li>
                </ul>
                
                <a class="button button-md button-default-outline-2 button-ujarak" href="../index.php?modo=cerrar_sesion" name="desconectar">Cerrar Sesión</a>
              </div>
            </div>
          </div>
          <!-- Contenido del Menu -->
          <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
              <div class="rd-navbar-nav-wrap">
                <!-- Iconos de Redes Sociales -->
                <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                  <li><a class="icon bi bi-facebook" href="https://www.facebook.com/"></a></li>
                  <li><a class="icon bi bi-twitter" href="https://www.twitter.com/"></a></li>
                  <li><a class="icon bi bi-github" href="https://www.github.com/"></a></li>
                  <li><a class="icon bi bi-instagram" href="https://www.instagram.com/"></a></li>
                </ul>
                <!-- Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="#hero">Inicio</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#about">Sobre nosotros</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#departments">Departamentos</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#services">Servicios</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="blog.php">Blog</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#contact">Contacto</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="carrito.php"><i class="bi bi-cart4"></i> Carrito</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div> <!-- End Navbar-->
    </header>
  </div>

  <!-- ======= Hero ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenido a DentShiney, <?php echo $_SESSION['usuario']; ?></h1>
      <h2>Se inicio sesión el dia: <?php echo $_SESSION['fecha']; ?></h2>
    </div>
  </section> <!-- End Hero -->


  <!-- Main -->
  <main id="main">
    <!-- ======= Why Us ======= -->
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>¿Por qué elegir DentShiney?</h3>
              <p>Porque cada sonrisa merece atención personalizada. En nuestro consultorio, cuidamos cada detalle de tu sonrisa, donde la calidad se encuentra con la comodidad y hacemos que tu visita al dentista sea una experiencia positiva.
                Brindamos cuidado dental con pasión y precisión porque una sonrisa saludable es una inversión en tu bienestar.</p>
              <div class="text-center">
                <a href="#about" class="more-btn">Más Info <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          
          <!-- Más Contenido-->
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="fa fa-toilet"></i>
                    <h4>Datos curiosos acerca del cepillado y la higiene bucal</h4>
                    <p>Al halar la cadena del inodoro con la tapa abierta, las partículas de aire que se desprenden pueden viajar hasta tu cepillo de dientes. Por eso, se recomienda guardarlo en un cajón o mantenerlo al menos a dos metros de distancia de este.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi bi-virus"></i>
                    <h4>Datos curiosos acerca de tu boca</h4>
                    <p>En la boca de un ser humano habitan más de <strong>700</strong> tipos de bacterias distintas.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bi bi-book-half"></i>
                    <h4>Curiosidades y datos interesantes sobre la odontología</h4>
                    <p>En el siglo XVII los herreros y <strong>barberos también trabajaban como dentistas</strong>.</p>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Más Contenido -->
        </div>
      </div>
    </section> <!-- End Why Us -->

    <!-- ======= About ======= -->
    <section id="about" class="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="video/Presentación_DentShiney_Final.mp4" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Más información sobre nosotros.</h3>
            <p>En nuestras consultas podra encontrar todo lo que buscan. Ofrecemos a nuestros clientes servicios de calidad y profesionalidad; en el que priman el compromiso; la atención cercana y personalizada; tecnología de vanguardia; modernas y cómodas instalaciones, y un equipo humano altamente cualificado. <br> 
            Les aseguramos que nuestros profesionales de dientes son excelentes y cuidaran muy bien de sus sonrisas. 
            A continuación, se encuentra informaciones adicionales que le puede interesar:</p>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-chat-square-heart"></i></div>
              <h4 class="title"><a href="#about">ATENCIÓN PERSONALIZADA</a></h4>
              <p class="description">Nos ocupamos en todo momento de cuidar de tu salud bucodental, ofreciendo un trato cercano y empático para que te sientas como en casa.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar3"></i></div>
              <h4 class="title"><a href="#about">PUNTUALIDAD Y CITA INMEDIATA</a></h4>
              <p class="description">Nos diferenciamos por respetar los tiempos de cada uno de nuestros pacientes, evitando las largas esperas y favoreciendo la puntualidad en las citas fijadas.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-bookmark-star"></i></div>
              <h4 class="title"><a href="#about">AMPLIA EXPERIENCIA</a></h4>
              <p class="description">Nuestro equipo está formado por profesionales de la odontología especializados gracias a un programa de formación continua.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-display"></i></div>
              <h4 class="title"><a href="#about">TECNOLOGÍA DE VANGUARDIA</a></h4>
              <p class="description">Contamos con equipos dentales de última generación y la tecnología más avanzada para ofrecerte el diagnóstico y el tratamiento más eficaz.</p>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- End About -->

    <!-- ======= Departamentos ======= -->
    <section id="departments" class="departments">
      <div class="container">
        <div class="section-title">
          <h2>Departamentos</h2>
          <p>A continuación del video (como el video es solo un borrador creado para dar idea de como seria el dentista, aunque no se muestra todo los departamentos que debe haber) en esta sección se explicará más detalladamente los departamentos que hay en la clínica.</p>
        </div>

        <!-- Lista de Departamentos -->
        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Área de Recepción</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Sala de espera</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Área de Tratamiento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Área de Esterilización</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Lavabos (Baños)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Zona de Administración</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-7">Área Personal y Laboratorio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-8">Área de Rayos X</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-9">
            <!-- Contenido de Departamentos -->
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1"> <!-- DEPARTAMENTO 1 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área de recepción de la Clínica dental</h3>
                    <p>La <strong>zona de recepción de la clínica dental</strong>, al ser el primer espacio al que accede el paciente, tiene una <strong>gran relevancia a la hora de generar una primera impresión gratificante</strong>. Para ello cuenta con una gran organización y limpieza, así como con una <strong>decoración armónica y sencilla</strong> que ofrezca sensación de agrado y siempre acorde con el resto del diseño de la clínica.</p>
                    <p>La <strong>recepción de la clínica dental se ubica</strong> cerca de la <strong>puerta de entrada para poder recibir y despedir a los pacientes</strong> de forma adecuada y cerca de la sala de espera, con el fin de poder tenerla controlada.</p>
                    <p>En cuanto al <strong>mobiliario</strong>, seleccionamos un mostrador con doble altura, uno a 1,15 cm del suelo y otro más bajo para poder atender a las personas con minusvalías o niños.</p>
                    <p>Además, mantenemos una <strong>temperatura y ventilación</strong> adecuada que ofrezce, a la clínica, un ambiente agradable y un sistema de iluminación óptimo.</p>
                    <p>Y por último, en el mostrador esta todos los aparatos necesarios para la <strong>recepción de llamadas y recogida de citas, el servicio de información para los pacientes</strong>, la administración de ficheros y el sistema de comunicación interna con las demás áreas de la clínica.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-2"> <!-- DEPARTAMENTO 2 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Sala de espera de la Clínica dental</h3>
                    <p>La <strong>sala de espera en la clínica dental</strong> es otra de las <strong>áreas que cuidamos con especial detenimiento</strong> para que los pacientes se sientan cómodos. Por eso se encuentre <strong>ubicada cerca del servicio de recepción</strong>.</p>
                    <p>Como en el resto de la clínica dental, la <strong>decoración de la sala de espera</strong> sigue una línea sencilla y personal. En este sentido, hemos decidido añadir cuadros que transmite relajación y algunas plantas. Además, es vital, mantener en todo momento el espacio limpio y ordenado, así como una <strong>temperatura y ventilación</strong> adecuadas para el máximo confort de nuestros pacientes.</p>
                    <p>En cuanto al <strong>mobiliario de la sala de espera de la clínica dental</strong>, seleccionamos unos <strong>asientos confortables para los pacientes</strong>. Y añadimos algunas <strong>mesa central con revistas, folletos o periódicos</strong> de acceso común para hacer más agradable la espera.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-3"> <!-- DEPARTAMENTO 3 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área de tratamiento en la Clínica dental</h3>
                    <p>Es el <strong>área de trabajo odontológico donde se llevan a cabo las consultas</strong> y donde se encuentran los equipos sanitarios.</p>
                    <p>En nuestra clínica al tener bastante espacio, contamos con <strong>unidades cerradas, para proteger la privacidad del paciente</strong>, en la que incluye todo los equipamientos necesario para cada consulta.
                    En esta área, al igual que en todas, mantenemos una <strong>temperatura y climatización</strong> adecuadas. Sin embargo, en estas salas, por diversas condiciones de asepsia, reproducción de organismos o agentes infecciosos y mantenimiento de equipos o material sanitario, <strong>añadimos un sistema de ventilación</strong> que complementa al aire acondicionado que garantiza la renovación del aire necesaria en nuestras consultas.</p>
                    <p>En cuanto a la <strong>iluminación</strong> <strong>empleamos tonos fríos o neutros</strong> y tratamos de <strong>utilizar unidades dentales provistas de sistemas de iluminación artificial</strong> que posibiliten una correcta visibilidad evitando encandilamientos y sombras.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-4"> <!-- DEPARTAMENTO 4 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área de esterilización en la Clínica dental</h3>
                    <p>La <strong>sala de esterilización de la clínica dental</strong> tiene una <strong>gran relevancia dentro de la clínica</strong>. No consta de muchos metros, pero en ella se encuentra <strong>todos los elementos necesarios para un correcto proceso de esterilización</strong> y almacenaje del instrumental. Sin embargo, con el fin de facilitar el proceso de limpieza, recogida y almacenaje de todo el material utilizado durante nuestras intervenciones odontológicas, decidimos colocar esta área en un <strong>lugar próximo a la zona de consulta</strong>.</p>
                    <p>Es importante que <strong>dentro del área de esterilización de la clínica odontológica</strong> se sigan siempre unas <strong>pautas concretas de actuación</strong> que ofrece seguridad a los pacientes. En esta zona cuenta con <strong>dos pilas de agua corriente</strong> para el lavado del instrumental y utilizamos un método de almacenaje seguro y con una identificación clara que permita tener localizados todos nuestros materiales.</p>
                    <p>Por norma general, es en esta sala donde se aprovecha para depositar los <strong>equipos de ultrasonidos, los autoclaves</strong> y el resto de bandejas de <strong>instrumental odontológico</strong> que se utiliza durante el día a día y que deben ser almacenados tras su correcta esterilización. Para acabar, se señaliza en las puertas para permitir a los pacientes identificarlo fácilmente y así, ofrecerles una imagen inmejorable de seguridad y limpieza.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-5"> <!-- DEPARTAMENTO 5 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área de lavabos y servicios higiénicos en la Clínica dental</h3>
                    <p>En cuanto a <strong>los lavabos y sanitarios en la clínica dental</strong>, disponemos de un servicio destinado al personal de la clínica y otro destinado a los pacientes. En cualquier caso, el baño que esta destinado a los pacientes esta ubicado en las <strong>zonas de tránsito</strong>, cerca de las consultas, y esta debidamente señalizado. Y el que esta destinado al personal sanitario, se encuentra en la zona restringida.</p>
                    <p>Los lavabos (optamos por unos lavabos uspendidos), <strong>se situa a una altura de unos 80 centímetros del suelo</strong> y se encuentran suspendidos para facilitar el acceso a pacientes con minusvalías o niños. También seleccionamos los <strong>grifos de activación eléctrica</strong>, es decir, que se activan de forma automática al acercar las manos, minimizando la aparición de microorganismos y evitando los consumos excesivos de agua.</p>
                    <p>En cuanto al suelos, hemos decidido utilizar materiales antideslizantes y que faciliten la limpieza de los mismos. En la pared utilizamos un alicatado hasta el techo, con el fin de contribuir a su limpieza y proporcionar una imagen de limpieza mayor.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-6"> <!-- DEPARTAMENTO 6 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área de despacho y zona de administración de la Clínica dental</h3>
                    <p>El <strong>despacho para el odontólogo en la clínica dental</strong> también tiene relevancia dentro del diseño de la misma. En esta sala el profesional puede parar a descansar y atender las conversaciones con sus pacientes. Para ello, <strong>colocamos una mesa y varias sillas</strong> para recibir a sus visitas,y a la vez de permitir el acceso de personas minusválidas.</p>
                    <p>La sala cuenta con una <strong>iluminación</strong> que permite la lectura y escritura y un <strong>sistema de climatización que mantiene una temperatura confortable</strong>. La <strong>decoración</strong>, por su parte, sigue la línea del resto de la clínica, pero con un toque más íntimo que ofrece comodidad al profesional y mayor seguridad a sus pacientes. Por último, tiene un sistema de <strong>comunicación interna</strong>, que permite contactar con el resto de departamentos de la clínica.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento6.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-7"> <!-- DEPARTAMENTO 7 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área para el personal y zona de laboratorio en la Clínica dental</h3>
                    <p>Disponemos de una zona exclusivamente destinada para el <strong>personal de la clínica</strong>. El lugar, esta ubicado en la zona restringida, donde los trabajadores puedan cambiarse y guardar sus efectos personales.</p>
                    <p>Además, en esa zona, colocamos una <strong>lavandería</strong> con el fin de disponer allí mismo la ropa de trabajo y evitar así cualquier tipo de contaminación.En este caso, mantenemos una temperatura inferior a 24 grados para impedir el crecimiento bacteriano en la ropa sucia que todavia no son lavados.</p>
                    <p>El <strong>laboratorio de la clínica dental</strong>, también esta ubicado en la <strong>zona restringida para el uso exclusivo del personal sanitario</strong>. Ésta sala cuenta con los <strong>equipamientos necesarios para desarrollar las actividades</strong> y cumple con todas las normas de seguridad y aislamiento oportunas.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento7.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-8"> <!-- DEPARTAMENTO 8 -->
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Área de Rayos X en la Clínica dental</h3>
                    <p>La <strong>sala de Rayos X en la clínica dental</strong> esta <strong>cerca de la zona de consultas</strong> y cuneta con unas medidas mínimas de seguridad que imponga la normativa vigente. Uno de los aspectos fundamentales en estas salas es que dispone de una señalización en las puertas de acceso con el símbolo internacional de radiación ionizante y la inscripción “Rayos X”.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/departments/departamento8.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div> <!-- End Contenido de Departamentos -->
          </div>
        </div> <!-- End Lista de Departamentos -->
      </div>
    </section> <!-- End Departamentos -->

    <!-- ======= Contador ======= -->
    <section id="counts" class="counts">
      <div class="container">
        <!-- Numeros de visitas -->
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="3" class="purecounter"></span>
              <p>Dentistas</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="3" class="purecounter"></span>
              <p>Departamentos</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="3" class="purecounter"></span>
              <p>Premios</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-users"></i>
              <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="3" class="purecounter bi bi-plus"></span>
              <p>Pacientes Atendidos</p>
            </div>
          </div>
        </div> <!--  End Numeros de visitas -->
      </div>
    </section> <!-- End Contador -->

    <!-- ======= Servicios ======= -->
    <section id="services" class="services">
      <!-- Contenidos de Servicios -->
      <div class="container">
        <div class="section-title">
          <h2>Servicios</h2>
          <p>En esta sección se encuentra los diferentes servicios que puede ofrecer DentShiney, más las informaciones sobre el servicios que le interesan.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/implante.png" alt=""></div>
              <h4><a href="../pages-services/implantes.php">Implantes dentales</a></h4>
              <p>Son estructuras metálicas, generalmente de titanio, que se introducen en los huesos maxilares. Tienen el objetivo de proporcionar anclaje para algún tipo de prótesis dentaria o diente artificial.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/brackets.png" alt=""></div>
              <h4><a href="../pages-services/ortodoncia.php">Ortodoncia</a></h4>
              <p>Es la rama de la odontología que se encarga de los problemas de los dientes y la mandíbula. La atención dental con ortodoncia incluye el uso de dispositivos, tales como los aparatos (frenos), para: enderezar los dientes y corregir problemas con la mordida.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/familia.png" alt=""></div>
              <h4><a href="../pages-services/odontopediatria.php">Odontopediatría</a></h4>
              <p>Es la rama de la odontología encargada de tratar a niños y recién nacidos. Desde el nacimiento hasta los 6 años, cuida de los dientes temporales y, a partir de los 12 años, controla el inicio de la dentición definitiva.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/cirugia.png" alt=""></div>
              <h4><a href="../pages-services/cirugias.php">Cirugías dentales</a></h4>
              <p>Hace referencia a cualquier procedimiento quirúrgico en la boca y la mandíbula o alrededor de estas. Tiene como objetivo solucionar problemas o extirpar elementos anatómicos patológicos.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/diente-sano.png" alt=""></div>
              <h4><a href="../pages-services/periodoncia.php">Periodoncia</a></h4>
              <p>Es la especialidad que previene, diagnostica y trata las enfermedades producidas por la acumulación de la placa bacteriana, la cual se convierte en sarro y genera problemas en los dientes y las encías.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/interior-diente.png" alt=""></div>
              <h4><a href="../pages-services/endodoncia.php">Endodoncia</a></h4>
              <p>Es un tratamiento dental conocido comúnmente para “matar el nervio”. Consiste en eliminar la parte profunda del diente cuando se encuentra lesionado o infectado. El objetivo de este tratamiento es limpiar el diente por dentro y rellenarlo de un material inerte.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><img id="imagen-servicios" src="../img/services/diente-limpio.png" alt=""></div>
              <h4><a href="../pages-services/limpieza.php">Limpieza y mantenimiento dental</a></h4>
              <p>Son proceso que mantienen limpios y sanos a nuestras encías, dientes, lengua y la boca en general, permitiéndonos tener un aliento fresco, conservar nuestras piezas dentarias y no sufrir molestias.</p>
            </div>
          </div>
        </div> <!-- End Contenidos de Servicios -->
      </div>
    </section> <!-- End Servicios -->

    <!-- ======= Dentistas ======= -->
    <section id="dentist" class="dentist">
      <div class="container">
        <div class="section-title">
          <h2>Dentistas</h2>
          <p>Somos un equipo de profesionales cualificados con más de 30 años de experiencia en tratamientos de odontología general.</p>
          <p> Si quieres saber más sobre nuestros equipo de expertos en odontología, conoce en estos artículos todo sobre nuestros dentistas:</p>
        </div>

        <!-- Lista de Dentistas -->
        <div class="row">
          <div class="col-lg-6 mt-4"> <!-- DENTISTA 1 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Manuel García Domínguez </h4>
                <span>Odontólogo</span>
                <p>Implantes dentales, Regeneración ósea dental, <br> Impresión dental digital, Estética dental, Ácido hialurónico.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0"> <!-- DENTISTA 2 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Pedro Fernández Santos</h4>
                <span>Odontólogo</span>
                <p>Implantes dentales, Regeneración ósea dental, <br> Impresión dental digital, Estética dental, Ácido hialurónico.</p>
              </div>
            </div>
          </div>
 
          <div class="col-lg-6 mt-4"> <!-- DENTISTA 3 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Camila Green Cooper</h4>
                <span>Odontólogo</span>
                <p>Implantes dentales, Estética dental, Carillas de <br> composite, Regeneración ósea dental, Bruxismo, <br> Articulación temporomandibular (ATM).</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 4 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Aline Ramos Soares</h4>
                <span>Odontólogo</span>
                <p>Cirugía ortognática, Ortodoncia adultos, <br> Ortodoncia estética, Ortodoncia infantil, Ortodoncia invisible.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 5 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-5.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Elisa Huber Werner</h4>
                <span>Odontólogo</span>
                <p>Prótesis dental, Prótesis sobre implantes, <br> Estética dental, Carillas de composite, Periodoncia.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 6 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-6.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Anna Collins Scott</h4>
                <span>Higienista y auxiliar dental</span>
                <p>Higienista dental Ortodoncia.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 7 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-7.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Joshua Cooper Robinson</h4>
                <span>Higienista y auxiliar dental</span>
                <p>Higienista dental Cirugía y Ortodoncia.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 8 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-8.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Julie Schouten Smit</h4>
                <span>Higienista y auxiliar dental</span>
                <p>Auxiliar dental y Higienista dental.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 9 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista-9.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Irene Muñoz Ortíz</h4>
                <span>Administración, recepción y atención al paciente</span>
                <p>Administración, Recepción y Atención al paciente.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4"> <!-- DENTISTA 10 -->
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dentists/dentista10.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson White</h4>
                <span>Administración, recepción y atención al paciente</span>
                <p>Administración, Recepción y Atención al paciente.</p>
              </div>
            </div>
          </div>
        </div> <!-- End Lista de Dentistas -->
      </div>
    </section><!-- End Dentistas -->

    <!-- ======= Preguntas Frecuentes ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Preguntas Frecuentes</h2>
          <p>Algunas de las preguntas frecuentes que suelen hacer a la hora de elegir DentShiney:</p>
        </div>

        <!-- Lista de Preguntas -->
        <div class="faq-list">
          <ul>
            <li data-aos="fade-up"> <!-- PREGUNTA 1 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">¿A qué edad hay que acudir al odontólogo? 
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>Se recomienda visitar al dentista por primera vez al completarse la primera dentición, en torno a los dos años y medio o tres. No obstante, puede hacerse también al cumplir un año o con la erupción de los primeros dientes. Y, por supuesto, ante cualquier problema que surja en esos primeros dientes o en la erupción de los mismos. Además, esa primera visita al odontólogo resulta muy útil como toma de contacto con el odontólogo, para crear confianza, con el fin de evitar futuros miedos o temores que surgen en algunos pacientes o niños, sobre todo cuando su primera visita es directamente para un tratamiento, como el empaste de una caries.</p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100"> <!-- PREGUNTA 2 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">¿Para qué sirve la revisión dental? ¿Cada cuánto tiempo se debe visitar al dentista?
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>Acudir al dentista periódicamente ayuda a detectar problemas a tiempo y evitar tratamientos tardíos y de urgencia. Aunque no se sientan molestias ni dolores, hay trastornos asintomáticos o que se sienten en fases avanzadas. Además, las necesidades de ortodoncia muchas veces no se perciben a simple vista. Así, las revisiones periódicas son una medida de prevención. La periodicidad de las visitas depende de la edad y el estado de su dentadura. Suelen oscilar entre seis meses y un año.</p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200"> <!-- PREGUNTA 3 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">¿Cuántas veces y cuándo hay que cepillarse los dientes?
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>Lo ideal es lavarse los dientes después de cada comida. Si no es posible, por lo menos debe realizarse el cepillado dental dos veces al día, y siempre por la noche antes de dormir. También es importante el tiempo dedicado a lavarse los dientes y el método. Se recomienda que el cepillado dure en torno a dos o tres minutos. La mejor técnica es con un cepillo suave colocado en ángulo de 45 º, con movimientos cortos adelante y atrás y circulares, cubriendo por completo los dientes. Siempre hay que cepillar los dientes por dentro, por fuera y por la zona de masticación. Se debe cambiar el cepillo cada tres o cuatro meses.</p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300"> <!-- PREGUNTA 4 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">¿Para qué sirven los enjuagues bucales? ¿Es importante usarlos?
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>Los colutorios son un complemento de la higiene bucodental. Pero nunca deben sustituir al cepillado. Suelen ayudar a reforzar el esmalte, reducir la sensibilidad dental, eliminar bacterias y combatir el mal aliento. Por ello, su uso es más recomendable en pacientes con halitosis, mayor propensión a caries por problemas en el esmalte dental, gingivitis o periodontitis.</p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400"> <!-- PREGUNTA 5 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">¿Cuándo hay que utilizar seda dental? ¿Y el cepillo interdental?
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>La seda y el hilo dental ayudan en la higiene interproximal. Su uso elimina la placa dental o los restos de alimentos que quedan en los espacios interdentales, además del margen entre el diente y la encía. Se debe usar al menos una vez al día. El cepillo interdental también ayuda a limpiar las áreas entre los dientes. Puede resultar más útil en los casos en los que los espacios entre los dientes son grandes. Así que el uso de uno u otro dispositivo depende de la dentadura y los problemas de cada paciente. Debe ser el dentista el que aconseje a cada persona cuál emplear. También son muy útiles los irrigadores bucales como complemento al cepillado.</p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400"> <!-- PREGUNTA 6 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">¿Cuál es la enfermedad bucodental más común?
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                <p>La patología más común son las caries dentales, las cuales pueden producirse a cualquier edad. Consisten en lesiones provocadas por la acción corrosiva de las bacterias de la boca que destruyen los tejidos del diente. La forma más eficaz de prevenirlas es una buena higiene diaria. Su tratamiento es el empaste u obturación. Consiste en limpiar la cavidad en la que está la caries y rellenarla de un material llamado composite, que imita el tono exacto de la pieza con caries. A este problema, le siguen en cuanto a prevalencia la gingivitis (inflamación y enrojecimiento de las encías por acumulación de placa bacteriana) y periodontitis (progresión de la gingivitis afectando al hueso).</p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400"> <!-- PREGUNTA 7 -->
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">¿Qué es la <strong>sensibilidad dental</strong>?
                <i class="bx bx-chevron-down icon-show"></i>
                <i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                <p>Se trata de un dolor agudo de corta duración como un pinchazo en los dientes que surge ante estímulos térmicos (comidas y bebidas frías o calientes), químicos o táctiles. Se produce cuando la dentina blanda de dentro de los dientes queda expuesta con pequeños agujeros. De esta forma, estos agujeros sirven como canales que van hasta el centro del diente, donde se encuentra el nervio. Así, al comer cosas frías, calientes, dulces o ácidos, ese estímulo llega al nervio produciendo como una punzada. La dentina puede quedar expuesta por la recesión de las encías o el desgaste del esmalte.</p>
              </div>
            </li>
          </ul>
        </div> <!-- End Lista de Preguntas -->
      </div>
    </section><!-- End Preguntas Frecuentes -->

    <!-- ======= Testimonios ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <!-- Lista de Testimonios -->
          <div class="swiper-wrapper">
            <div class="swiper-slide"> <!-- TESTIMONIO 1 -->
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../img/testimonials/testimonio1.jpg" class="testimonial-img" alt="">
                  <h3>Good Man</h3>
                  <h4>Anónimo</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Después de un fin de semana muy doloroso de vacaciones, me presenté un lunes por la mañana sin cita y me atendieron en media hora, fueron fantásticos, tan amable, tan eficiente y después de diagnosticar una infección bajo un diente me dieron una receta de antibióticos y una copia de los rayos X para mi dentista. Sin duda recomendaría a estos chicos, que eran fabulosos.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide"> <!-- TESTIMONIO 2 -->
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../img/testimonials/testimonio2.jpg" class="testimonial-img" alt="">
                  <h3>Cherry Cake</h3>
                  <h4>Anónimo</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Mi corona dental se cayó durante mis vacaciones y conseguí una cita el mismo día. El personal fue muy amable y profesional, y el dentista y su asistente hicieron un trabajo perfecto reemplazando mi corona, que estaba en un diente frontal y se veía mucho. Recomiendo a esta clínica dental y no dudaría en volver otra vez.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide"> <!-- TESTIMONIO 3 -->
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../img/testimonials/testimonio3.jpg" class="testimonial-img" alt="">
                  <h3>Sakura Mochi</h3>
                  <h4>Anónimo</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Dentista increíble, me hice una endodoncia y no sentí ningún dolor. Habla un inglés perfecto y me pareció muy amable. Lo recomiendo.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide"> <!-- TESTIMONIO 4 -->
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../img/testimonials/testimonio4.jpg" class="testimonial-img" alt="">
                  <h3>Matt</h3>
                  <h4>Anónimo</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Los Drs de DentShiney son increíblemente honestos. Ponen pasión en lo que hacen y lo hacen muy bien. Estoy encantado de haber encontrado una clínica honesta y amable, lo recomendaría para alguien que esté buscando un tratamiento.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide"> <!-- TESTIMONIO 5 -->
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../img/testimonials/testimonio5.jpg" class="testimonial-img" alt="">
                  <h3>Tommy</h3>
                  <h4>Anónimo</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Se puede decir sinceramente, el mejor dentista que he visitado, desde la recepción, al dentista y la enfermera. Muchas gracias. Lo recomiendo encarecidamente.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
          </div> <!-- End Lista de Testimonios -->

          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonios -->

    <!-- ======= Galería ======= -->
    <section id="gallery" class="gallery">
      <div class="container">
        <div class="section-title">
          <h2>Galería</h2>
          <h4>Disfruta de nuestra galería de imagenes.</h4>
        </div>
      </div>

      <!-- Galería Imagenes -->
      <div class="container-fluid">
        <div class="row g-0">
          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 1 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-1.png" class="galelry-lightbox">
                <img src="../img/gallery/imagen-1.png" height="600px" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 2 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-2.png" class="galelry-lightbox">
                <img src="../img/gallery/imagen-2.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 3 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-3.jpg" class="galelry-lightbox">
                <img src="../img/gallery/imagen-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 4 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-4.jpg" class="galelry-lightbox">
                <img src="../img/gallery/imagen-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 5 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-5.jpg" class="galelry-lightbox">
                <img src="../img/gallery/imagen-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 6 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-6.jpg" class="galelry-lightbox">
                <img src="../img/gallery/imagen-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 7 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-7.jpg" class="galelry-lightbox">
                <img src="../img/gallery/imagen-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4"> <!-- IMAGEN 8 -->
            <div class="gallery-item">
              <a href="../img/gallery/imagen-8.jpg" class="galelry-lightbox">
                <img src="../img/gallery/imagen-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>
        </div>
      </div> <!-- End Galería Imagenes -->
    </section><!-- End Galería -->

    <!-- ======= Contacto ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Contacto</h2>
          <p>Para cualquier dudas pueden contactar con nosotros a través de los números de teléfonos o por los correos electrónicos, que esta a continuación:</p>
        </div>
      </div>

      <!-- Map -->
      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Madid,%20Espa%C3%B1a+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" allowfullscreen></iframe>
      </div>

      <!-- Información -->
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-6">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Ubicación:</h4>
                <p>C. de Bravo Murillo, 151, Tetuán, 28020 Madrid</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Correo para Información:</h4>
                <p>info@DentShiney.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Teléfono:</h4>
                <p>+34 907 98 00 32</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="info">
              <br>
              <br>
              <br>
             
              <div class="email">
                <i class="bi bi-envelope-at"></i>
                <h4>Email para concretar citas:</h4>
                <p>pedircita@DentShiney.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-whatsapp"></i>
                <h4>Teléfono de WhatApp:</h4>
                <p>+34 667 73 44 11</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Información -->
    </section> <!-- End Contacto -->
  </main><!-- End Main -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>