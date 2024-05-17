  <!-- Favicon -->
  <link href="../img/favicon.png" rel="icon">

  <!-- Fuentes de Google -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Archivos CSS Vendor -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Archivos CSS Pricipales -->
  <link rel="stylesheet" href="../css/estilos_principal.css">
  <link rel="stylesheet" href="../css/b00tstraps.css">
  <link rel="stylesheet" href="../css/fonts.css">
</head>

<?php 
// Conectamos a la base de datos del fichero funciones.inc
include("../config/funciones.inc");

// Recuperamos la información de la sesión
session_start();

// Cerrar sesion
if(isset($_POST['desconectar'])) {
  $desconectar = logout();
}

// Comprobamos que el usuario se haya autentificado
if (isset($_SESSION['usuario'])) {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="../index.php?modo=cerrar_sesion" name="desconectar">Cerrar Sesión</a>';
  $page = "pages/sesion.php";
  $extra = "../pages/";
} else {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="../pages/login.php" name="iniciar">Iniciar Sesión</a>';
  $page = "index.php";
  $extra = "../pages/";
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
                  <a href="../<?php echo $page;?>"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
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

                <?php echo $sesion; ?>
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
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #hero">Inicio</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #about">Sobre nosotros</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #departments">Departamentos</a></li>
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="../<?php echo $page;?> #services">Servicios</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $extra;?>blog.php">Blog</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #contact">Contacto</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $extra;?>carrito.php"><i class="bi bi-cart4"></i> Carrito</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div> <!-- End Navbar-->
    </header>
  </div>