<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Blog</title>

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

// Comprobamos que el usuario se haya autentificado
if (isset($_SESSION['usuario'])) {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="../index.php?modo=cerrar_sesion" name="desconectar">Cerrar Sesión</a>';
  $page = "pages/sesion.php";
} else {
  $sesion = '<a class="button button-md button-default-outline-2 button-ujarak" href="login.php" name="iniciar">Iniciar Sesión</a>';
  $page = "index.php";
}

if(isset($_POST['subir'])) {
  $id = (isset($_POST['id'])) ? $_POST['id'] : "";
  $nombre = $_POST['name'];
  $email = $_POST['email'];
  $web = $_POST['web'];
  $comentario = $_POST['comment'];
  $save = (isset($_POST['save'])) ? 1 : 0; // Si save está marcado, será 1, de lo contrario, será 0

  if (empty($nombre) || empty($email) || empty($comentario))
    $error = "Hay que introducir todos los datos";
  else {
    $blog = dataBase::anadirComentario($nombre, $email, $web, $comentario, $save); 
    $mensaje = "Nuevo Comentario añadido correctamente.";   
  }
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
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #services">Servicios</a></li>
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Blog</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../<?php echo $page;?> #contact">Contacto</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="carrito.php"><i class="bi bi-cart4"></i> Carrito</a></li>
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
    <!-- ======= Blog ======= -->
    <section class="blog">
      <div class="container">
        <div class="section-title">
          <h2>Blog</h2>
          <img src="../img/blog.jpg" alt="" class="container-fluid">
        </div>

        <!-- Mostrar los Comentarios -->
        <div id="comments" class="about">
          <h3>Cometarios</h3>
          <?php 
          $conexion = conectar();
          $sentenciaSQL = $conexion->prepare("SELECT * FROM blog");
          $sentenciaSQL->execute();
          $listaComentarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

          foreach($listaComentarios as $comentario) { ?>
          <div class="icon-box">
            <div class="icon"><i class="bi bi-chat-dots"></i></div>
            <h4 class="title"><?php echo $comentario['name']; ?></h4>
            <h6 class="title"><a href="<?php echo $comentario['web']; ?>"> <?php echo $comentario['web']; ?></a></h6>
            <p class="description"><?php echo $comentario['comment']; ?></p>
          </div>
          <?php } ?>
        </div>
        <br><br>
        <!-- Formulario de Comentarios -->
        <div class="col-lg-8 mt-5 mt-lg-0">
          <h3>Dejar cometarios</h3>
          <p>Tu dirección de correo electrónico no será publicada. <br> Los campos obligatorios están marcados con *.</p> <br>
          <form class="php-email-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
              <div class="col-md-6 form-group">
                <input name="name" type="text" class="form-control" placeholder="Nombre*" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input name="email" type="email" class="form-control" placeholder="Correo electrónico*" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input name="web" type="text" class="form-control" placeholder="Web">
            </div>
            <div class="form-group mt-3">
              <textarea name="comment" class="form-control" rows="5" placeholder="Comentarios*" required></textarea>
            </div>
            <div class="form-group mt-3">
              <label><input name="save" type="checkbox" value="1"> Guarda mi nombre, correo electrónico y web en este navegador para la próxima vez que comente</label>
            </div>

            <?php if(isset($error)) { ?>
              <div class="alert alert-danger" role="alert">
                <strong><?php echo $error; ?></strong>
              </div>
            <?php } ?><!-- mensaje de error -->
            <?php if(isset($mensaje)) { ?>
              <div class="alert alert-success" role="alert">
                <strong><?php echo $mensaje; ?></strong>
              </div>
            <?php } ?><!-- mensaje -->

            <div class="text-center">
              <button type="submit" name="subir">Subir Comentario</button>
            </div>
          </form> 
        </div> <!-- End Formulario -->
      </div> 
    </section> <!-- End Blog -->
  </main><!-- End Main -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>