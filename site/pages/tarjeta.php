<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Pago Tarjeta</title>

  <!-- Exportar la CABECERA de la página -->
  <?php include("template/header.php"); ?>

  <style>
    .cc-img {
      margin: 0 auto;
    }

    #date-separator{
      margin-left: 10px;
      margin-right: 10px;
      margin-top: 5px;
    }

    #formularioVerifica{
      border-top: 2px solid #5ea4f3;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
      background-color: #ffffff;
      padding: 0;
      max-width: 600px;
      margin: auto;
    }

    .products{
      background-color: #f7fbff;
      padding: 25px;
    }

    .products .title{
      font-size: 2em;
      border-bottom: 1px solid rgba(0,0,0,0.1);
      margin-bottom: 0.8em;
      font-weight: 600;
      padding-bottom: 8px;
    }

    .products .price{
      float: right;
      font-weight: 600;
      font-size: 1.2em;
    }

    .products .total{
      border-top: 1px solid rgba(0, 0, 0, 0.1);
      margin-top: 10px;
      padding-top: 19px;
      font-weight: 600;
      font-size: 1.2em;
    }

    .products .item-name{
      font-weight:400;
      font-size: 1.2em;
    }
  </style>
</head>

<?php 
// Conectamos a la base de datos del fichero funciones.inc
include("../config/funciones.inc");
// Conectamos a la base de datos del fichero dataBase.php
require_once('../config/dataBase.php');

// Recuperamos la información de la sesión
session_start();

// Comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) {
  header('Location: login.php'); 
}  else {
  date_default_timezone_set('Europe/Madrid');
  $_SESSION['hora'] = date("H:i");
}

if(isset($_POST['pagar'])) {
  $id = (isset($_POST['id'])) ? $_POST['id'] : "";
  $numTarjeta = $_POST['numTarjeta'];
  $fecha = "20" .$_POST['year'] ."-" .$_POST['mes'] ."-01";
  $codigo = $_POST['codigo'];
  $hora = $_SESSION['hora'];
  $nombre = $_POST['nombre'];
  $user = dataBase::selectUsuarioId($_SESSION['usuario']);

  // Validación de los campos
  if (empty($numTarjeta) || empty($fecha) || empty($codigo) || empty($nombre)) {
    $error = "Hay que introducir todos los datos";
  } else {
    // Verificar si los campos son numéricos
    if(is_numeric($numTarjeta) && is_numeric($codigo)) {
      // Convertir la fecha a formato numérico y verificar si es válida
      if (checkdate($_POST['mes'], 1, "20" . $_POST['year'])) {
        // Convertir los campos numéricos a enteros si es necesario
        $numTarjeta = intval($numTarjeta);
        $codigo = intval($codigo);
        // Procesar el pago
        $tarjeta = dataBase::anadirPagoFinalizado($nombre, $numTarjeta, $fecha, $codigo, $hora, $user); 
        // Establecer el carrito en 0 después de que el pago se haya realizado correctamente
        $_SESSION['carrito'] = 0;
        // Redirigir a la pagina se sesion
        header('Location: sesion.php?mensaje='.urlencode('PAGO REALIZADO CORRECTAMENTE'));
        exit;
      } else {
        $error = "La fecha es inválida";
      }
    } else {
      $error = "Los campos de tarjeta y código deben ser números";
    }
  }
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
                  <a href="#"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
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
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Pago</a></li>
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
    <!-- ======= Pago Tarjeta ======= -->
    <section class="pagoTarjeta">
      <div class="container">
        <div class="section-title">
          <h2></h2>
        </div>

        <?php $total=0; ?>
        
        <form id="formularioVerifica">
          <div class="products">
            <h3 class="title">Verificar</h3>
            <?php foreach($_SESSION['carrito'] as $indice=>$producto) { ?>
            <div class="item">
              <span class="price"><?php echo $producto['PRECIO']; ?>€</span>
              <span class="price">&nbsp&nbsp&nbsp;&nbsp; x<?php echo $producto['CANTIDAD']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <p class="item-name"><?php echo $producto['NOMBRE']; ?></p>
            </div>
            <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
            <?php } ?>
            <div class="total">Total<span class="price"><?php echo number_format($total,2); ?>€</span></div>
          </div>
        </form>

        <div class="row">
          <div class="col-12 col-md-8 offset-md-2">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <h3 class="text-center">Método de Pago</h3>
                  <img class="img-fluid cc-img" src="https://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                </div>
              </div>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="card-block">
                  <div class="row m-4">
                    <div class="col-12">
                      <div class="form-group">
                        <label>NÚMERO DE LA TARJETA</label>
                        <div class="input-group">
                          <input name="numTarjeta" type="text" class="form-control" placeholder="Número de tarjeta valido" required maxlength="16"/>
                          <span class="input-group-text" style="size: 25px;"><i class="bi bi-credit-card"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-4">
                    <div class="col-xs-7 col-md-7">
                      <div class="form-group">
                        <label>FECHA DE EXPIRACIÓN</label>
                        <div class="input-group expiration-date">
                          <input name="mes" type="text" class="form-control" placeholder="MM" minlength="1" maxlength="2">
                          <span id="date-separator"> / </span>
                          <input name="year" type="text" class="form-control" placeholder="YY" minlength="1" maxlength="2">
                          <input name="hora" type="hidden" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-5 col-md-5 float-xs-right">
                      <div class="form-group">
                        <label>CÓDIGO CV</label>
                        <input name="codigo" type="text" class="form-control" placeholder="CVC" required maxlength="3"/>
                      </div>
                    </div>
                  </div>
                  <div class="row m-4">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label>TITULAR DE LA TARJETA</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre del Titular de la Tarjeta" required/>
                        <input name="usuario" type="hidden" class="form-control"/>
                      </div>
                    </div>
                  </div>

                  <?php if(isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <strong><?php echo $error; ?></strong>
                    </div>
                  <?php } ?><!-- mensaje de error -->
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-12 col-lg-5" align="center">
                      <a class="btn btn-warning btn-lg btn-block" style="width: 100%;" href="https://www.paypal.com/signin"><img src="../img/paypal.png" alt="PayPal" width="120px"></a>
                    </div>
                    <div class="col-12 col-lg-1" align="center"><h5>ó</h5></div>
                    <div class="col-12 col-lg-6" align="center">
                      <button name="pagar" class="btn btn-warning btn-lg btn-block" type="submit" style="background-color: black; border-color: black; color: white; width: 100%;"><i class="fa fa-credit-card" aria-hidden="true"></i> Tarjeta de <span class="d-none d-xl-inline">débito o </span>crédito</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section> <!-- End Pago Tarjeta -->
  </main><!-- End Main -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>