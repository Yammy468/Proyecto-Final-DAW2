<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Lista de los productos</title>

  <!-- Exportar la CABECERA de la página -->
  <?php include("template/header.php"); ?>
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

if(isset($_SESSION['usuario'])) {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="../index.php?modo=cerrar_sesion" name="desconectar">Cerrar Sesión</a>';
} else {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="login.php" name="iniciar">Iniciar Sesión</a>';
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
                  <a href="mostrarLista.php"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
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
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="carrito.php">Volver a la Lista de Compra</a></li>
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
    <!-- ======= Lista de compra ======= -->
    <section class="listaProductos">
      <div class="container">
        <div class="section-title">
          <h2>Lista de la Cesta de Compra</h2>
        </div>

        <?php if(isset($mensaje)) { ?>
          <div class="alert alert-success" role="alert">
            <strong><?php echo $mensaje; ?></strong>
          </div>
        <?php } ?> <!-- mensaje -->

        <!-- Mostras la tabla de la lista selecionada -->
        <?php if(!empty($_SESSION['carrito'])) { ?>
        <table class="table table-light table-bordered">
          <tbody>
            <tr>
              <th width="40%">Descripción</th>
              <th width="15%" class="text-center">Cantidad</th>
              <th width="20%" class="text-center">Precio</th>
              <th width="20%" class="text-center">Total</th>
              <th width="5%">--</th>
            </tr>

            <?php $total=0; ?>
            <?php foreach($_SESSION['carrito'] as $indice=>$producto) { ?>
            <tr>
              <td width="40%"><?php echo $producto['NOMBRE']; ?></td>
              <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
              <td width="20%" class="text-center"><?php echo $producto['PRECIO']; ?>€</td>
              <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2) ?>€</td>

              <td width="5%">
                <!-- Formulario para ELIMINAR producto al Carrito -->
                <form action="" method="post">
                  <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                  <button class="btn btn-danger" name="botonAccion" type="submit" value="Eliminar">Eliminar</button>
                </form>
              </td>
            </tr>
            <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
            <?php } ?>

            <tr>
              <td colspan="3" align="right"><h3>Total</h3></td>
              <td align="right"><h3><?php echo number_format($total,2); ?>€</h3></td>
              <td></td>
            </tr>

            <tr>
              <td colspan="5">
                <a class="btn btn-primary btn-lg btn-block" name="botonAccion" type="submit" value="Pagar" style="background-color: dodgerblue; border-color: dodgerblue; width: 100%;" href="tarjeta.php">Proceder a pagar >></a>
              </td>
            </tr>
          </tbody>
        </table>
        <?php } else { ?> <!-- En caso de no hay producto en la cesta -->
          <div class="alert alert-success" role="alert">
            <strong>No hay productos en el carrito ...</strong>
          </div>
        <?php } ?>

        <div class="col-12">
          <p class="rights text-center">
          <span>DentShiney</span>
          <span>&copy;&nbsp;</span>
          <span class="copyright-year"></span>
          </p>
        </div>
      </div>
    </section> <!-- End Lista de compra -->
  </main><!-- End Main -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>