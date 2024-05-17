<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Carrito</title>

  <!-- Exportar la CABECERA de la página -->
  <?php include("template/header.php"); ?>
</head>

<?php 
// Conectamos a la base de datos del fichero funciones.inc
include("../config/funciones.inc");
// Conectamos a la base de datos del fichero dataBase.php
require_once('../config/dataBase.php');

// Recuperamos la información de la sesión
session_start();

if(isset($_SESSION['usuario'])) {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="../index.php?modo=cerrar_sesion" name="desconectar">Cerrar Sesión</a>';
  $page = "pages/sesion.php";
  $extra = "sesion.php";
} else {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="login.php" name="iniciar">Iniciar Sesión</a>';
  $page = "index.php";
  $extra = "../index.php";
} 

// Exportar las consulta de operationCarrito.php a la página 
include("../config/operationCarrito.php"); 
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
                  <a href="<?php echo $extra; ?>"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
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
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #services">Servicios</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="blog.php">Blog</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #contact">Contacto</a></li>
                  <!-- Apartado de la cesta de compra -->
                  <li class="rd-nav-item active dropdown" data-toggle="dropdown">
                    <a class="rd-nav-link dropdown-toggle" href="#"><i class="bi bi-cart4">(<?php echo (empty($_SESSION['carrito'])? 0 : count($_SESSION['carrito'])); ?>)</i> Carrito</a></li>
                    <div class="dropdown-menu">
                      <a class="button button-md button-default-outline-2 button-ujarak" href="mostrarLista.php" name="verCesta">Ver Cesta</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div> <!-- End Navbar-->
    </header>
  </div>

  <!-- Main -->
  <main id="main">
    <!-- ======= Carrito ======= -->
    <section class="blog">
      <div class="container">
        <div class="section-title">
          <h2>Carrito de la compra.</h2>
        </div>

        <?php if(isset($mensaje)) { ?>
          <div class="alert alert-success" role="alert">
          <strong><?php echo $mensaje; ?></strong>
          </div>
        <?php } ?> <!-- mensaje -->

        <!-- Mostrar el Carrito -->
        <div id="carrito" class="header">
          <h3>Bienvenido a la Tienda Online de DentShiney!</h3>

          <div class="row">
            <?php 
            $conexion = conectar();
            $sentenciaSQL = $conexion->prepare("SELECT * FROM `cesta-compra`");
            $sentenciaSQL->execute();
            $cestaCompra = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

            foreach($cestaCompra as $cesta) { ?>
            <!-- CARTA DE LOS PRODUCTOS -->
            <div class="col-sm-6 col-md-4 col-lg-3">
              <br>
              <div class="card">
                <!-- SACAR DE LA TABLA, LA COLUMNA DE 'image' -->
                <img height="260" id="cesta-imagen" class="card-img-top" src="../img/cesta-compra/<?php echo $cesta['image'] ?>">

                <div class="card-body">
                  <!-- SACAR DE LA TABLA, LA COLUMNA DE 'name' y 'price' -->
                  <h5 class="card-title"><?php echo $cesta['name']; ?></h5>
                  <h4 class="card-title"><?php echo $cesta['price']; ?> €</h4>

                  <!-- Formulario para AÑADIR producto al Carrito -->
                  <form action="" method="post">
                    <!-- Datos invisibles -->
                    <input type="hidden" name="id" id="id" value="<?php echo $cesta['id']; ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $cesta['name']; ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $cesta['price']; ?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">

                    <button class="btn btn-primary" name="botonAccion" type="submit" value="Agregar">+</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div> 
    </section> <!-- End Carrito -->
  </main><!-- End Main -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>