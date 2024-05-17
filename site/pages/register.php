<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Register</title>

  <!-- Exportar la CABECERA de la página -->
  <?php include("template/header.php"); ?>
</head>

<?php
// Conectamos a la base de datos del fichero funciones.inc
include("../config/funciones.inc");
// Conectamos a la base de datos del fichero dataBase.php
require_once('../config/dataBase.php');

if(isset($_POST['enviar'])) {
  $id = (isset($_POST['id'])) ? $_POST['id'] : "";
  $nombre = $_POST['name'];
  $apellido = $_POST['surname'];
  $usuario = $_POST['username'];
  $contrasena = md5($_POST['password']);
  $email = $_POST['email'];

  if (empty($nombre) || empty($apellido) || empty($usuario) || empty($contrasena) || empty($email))
    $error = "Hay que introducir todos los datos";
  else {
    session_start();
    if (dataBase::verificarUsuarioRepetido($nombre, $apellido)) {
      $error = "Lo siento, este usuario ya existe.";
    } else {
      $usuario = dataBase::anadirUsuarios($nombre, $apellido, $usuario, $contrasena, $email);
      $mensaje = "Nuevo Usuario añadido correctamente.";
    }
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
                  <a href="../index.php"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
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

                <a class="button button-md button-default-outline-2 button-ujarak" href="login.php">Iniciar Sesión</a>
              </div>
            </div>
          </div>
          <!-- Contenido del Menu -->
          <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
              <div class="rd-navbar-nav-wrap">
                <!-- Navbar Nav -->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item"><a class="rd-nav-link" href="../index.php #hero">Inicio</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div> <!-- End Navbar-->
    </header>
  </div>

  <div id="login">
    <br><br>
    <div class="d-flex justify-content-center h-100">
      <div class="card">
        <div class="card-header">
          <h2>Register</h2>
          <div class="d-flex justify-content-end social_icon">
            <span><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></span>
            <span><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></span>
            <span><a href="https://www.github.com/"><i class="fab fa-github"></i></a></span>
            <span><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></span>
          </div>
        </div> <!-- Cabecera del login con los logos de paginas web -->

        <div class="card-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class = "form-group"> <!-- id -->
              <input name="id" type="text" class="form-control" required readonly placeholder="ID">
            </div>

            <div class="input-group form-group"> 
              <input name="name" type="text" class="form-control" required placeholder="Nombre">
              <!--  -->
            </div>

            <div class="input-group form-group"> 
              <input name="surname" type="text" class="form-control" required placeholder="Apellidos">
              <!--  -->
            </div>

            <div class="input-group form-group"> 
              <input name="username" type="text" class="form-control" required placeholder="Nombre Usuario">
              <!--  -->
            </div>

            <div class="input-group form-group">
              <input name="password" type="password" class="form-control" required placeholder="Contraseña">
              <!--  -->
            </div>

            <div class="input-group form-group">
              <input name="email" type="text" class="form-control" required placeholder="Email">
              <!--  -->
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

            <br><br>
            <div class="form-group"> <!-- login -->
              <input type="submit" name="enviar" value="Registrarse" class="btn float-right login_btn">
            </div>
          </form>
        </div> <!-- Body de la carta -->

        <div class="card-footer">
          <div class="d-flex justify-content-center links">
            ¿Ya tienes una cuenta?<a href="login.php">Iniciar Sesión</a>
          </div>
        </div> <!-- Footer de la carta -->
      </div> <!-- card -->
    </div>
  </div> <!-- container -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>