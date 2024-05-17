<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>DentShiney - Administración</title>

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
} 

// Hacer conexion mediante PDO
try {
  $conexion = conectar();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

// Exportar las consulta de admin_user.php a la página 
include("../config/admin_user.php"); 

// Exportar las consulta de admin_blog.php a la página 
include("../config/admin_blog.php"); 

// Exportar las consulta de admin_cesta.php a la página 
include("../config/admin_cesta.php"); 
// Exportar las consulta de admin_cuenta.php a la página 
include("../config/admin_cuenta.php"); 
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
                  <a href="admin.php"><img src="../img/logo.png" alt="" width="300" height="80" /></a>
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
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="#user">Usuarios</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#blog">Blog</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#cesta">Carrito</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#pagos">Pagos realizados</a></li>
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
    <!-- ======= Admin ======= -->
    <section class="admin">
      <div class="container"> <!-- DATOS DE USUARIOS -->
        <div class="section-title">
          <h2>Administración</h2>
          <h3 id="user">Usuarios</h3>
        </div>

        <div class="row"> 
          <div class="col-md-5">
            <div class="card">
              <!-- CABECERA DE LA CARTA -->
              <div class="card-header">Datos de los Usuarios</div>
              <!-- CUERPO DE LA CARTA -->
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class = "form-group"> <!-- id -->
                    <label for="userID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $userID; ?>" name="userID" id="userID" placeholder="ID">
                  </div>
                  <div class = "form-group"> <!-- nombre -->
                    <label for="userName">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $userName; ?>" name="userName" id="userName" placeholder="Name">
                  </div>
                  <div class = "form-group"> <!-- apellido -->
                    <label for="userSurname">Apellidos:</label>
                    <input type="text" required class="form-control" value="<?php echo $userSurname; ?>" name="userSurname" id="userSurname" placeholder="Surnames">
                  </div>
                  <div class = "form-group"> <!-- usuario -->
                    <label for="userUsername">Usuario:</label>
                    <input type="text" required class="form-control" value="<?php echo $userUsername; ?>" name="userUsername" id="userUsername" placeholder="Username">
                  </div>
                  <div class = "form-group"> <!-- contraseña -->
                    <label for="userPassword">Contraseña:</label>
                    <input type="text" required class="form-control" value="<?php echo $userPassword; ?>" name="userPassword" id="userPassword" placeholder="Password">
                  </div>
                  <div class = "form-group"> <!-- correo -->
                    <label for="userEmail">Correo electrónico:</label>
                    <input type="text" required class="form-control" value="<?php echo $userEmail; ?>" name="userEmail" id="userEmail" placeholder="Email">
                  </div>

                  <br>
                  <div class="btn-group" role="group" aria-label=""> <!-- botones -->
                    <button type="submit" name="userAccion" <?php echo ($userAccion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="userAccion" <?php echo ($userAccion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="userAccion" <?php echo ($userAccion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                  </div>
                </form>
              </div> <!-- card-body -->
            </div> <!-- card -->
            <br>
          </div>

          <!-- MOSTRAR LOS DATOS EN UNA TABLA -->
          <div class="col-md-7 table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Usuario</th>
                  <th>Contraseña</th>
                  <th>Correo electrónico</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            <tbody>
              <?php foreach($listaUsuarios as $user) { ?>
              <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['surname']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['email']; ?></td>

                <td>
                  <form method="post">
                    <input type="hidden" name="userID" id="userID" value="<?php echo $user['id']; ?>" />
                    <input type="submit" name="userAccion" value="Seleccionar" class="btn btn-primary" />
                    <input type="submit" name="userAccion" value="Borrar" class="btn btn-danger" />
                  </form>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <br><br><br>
      <div class="container"> <!-- DATOS DE BLOG -->
        <div class="section-title">
          <h3 id="blog">Blog</h3>
        </div>

        <div class="row"> 
          <div class="col-md-5">
            <div class="card">
              <!-- CABECERA DE LA CARTA -->
              <div class="card-header">Datos de los Comentarios del Blog</div>
              <!-- CUERPO DE LA CARTA -->
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class = "form-group"> <!-- id -->
                    <label for="blogID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $blogID; ?>" name="blogID" id="blogID" placeholder="ID">
                  </div>
                  <div class = "form-group"> <!-- nombre -->
                    <label for="blogName">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $blogName; ?>" name="blogName" id="blogName" placeholder="Name">
                  </div>
                  <div class = "form-group"> <!-- email -->
                    <label for="blogEmail">Correo Electrónico:</label>
                    <input type="text" required class="form-control" value="<?php echo $blogEmail; ?>" name="blogEmail" id="blogEmail" placeholder="Email">
                  </div>
                  <div class = "form-group"> <!-- web -->
                    <label for="blogWeb">Web:</label>
                    <input type="text" class="form-control" value="<?php echo $blogWeb; ?>" name="blogWeb" id="blogWeb" placeholder="Web">
                  </div>
                  <div class="form-group"> <!-- comentario -->
                    <label for="blogComment">Comentarios:</label>
                    <textarea required class="form-control" name="blogComment" id="blogComment" placeholder="Comentario" maxlength="255"><?php echo htmlspecialchars($blogComment); ?></textarea>
                  </div>                
                  <div class="form-group"> <!-- guardar -->
                    <label for="blogSave">Guardar o no guardar datos:</label>
                    <input type="checkbox" name="blogSave" id="blogSave" value="1" <?php echo $blogSave ? 'checked' : ''; ?>>
                  </div>                

                  <br>
                  <div class="btn-group" role="group" aria-label=""> <!-- botones -->
                    <button type="submit" name="blogAccion" <?php echo ($blogAccion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="blogAccion" <?php echo ($blogAccion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="blogAccion" <?php echo ($blogAccion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                  </div>
                </form>
              </div> <!-- card-body -->
            </div> <!-- card -->
            <br>
          </div>

          <!-- MOSTRAR LOS DATOS EN UNA TABLA -->
          <div class="col-md-7 table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Correo electrónico</th>
                  <th>Web</th>
                  <th>Comentario</th>
                  <th>Guardar o no</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            <tbody>
              <?php foreach($listaComentarios as $comentario) { ?>
              <tr>
                <td><?php echo $comentario['id']; ?></td>
                <td><?php echo $comentario['name']; ?></td>
                <td><?php echo $comentario['email']; ?></td>
                <td><?php echo $comentario['web']; ?></td>
                <td><?php echo $comentario['comment']; ?></td>
                <td><?php echo $comentario['save']; ?></td>
                
                <td>
                  <form method="post">
                    <input type="hidden" name="blogID" id="blogID" value="<?php echo $comentario['id']; ?>" />
                    <input type="submit" name="blogAccion" value="Seleccionar" class="btn btn-primary" />
                    <input type="submit" name="blogAccion" value="Borrar" class="btn btn-danger" />
                  </form>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <br><br><br>
      <div class="container"> <!-- DATOS DE LA CESTA DE COMPRA -->
        <div class="section-title">
          <h3 id="cesta">Cesta de la compra</h3>
        </div>

        <div class="row"> 
          <div class="col-md-5">
            <div class="card">
              <!-- CABECERA DE LA CARTA -->
              <div class="card-header">Datos de la Cesta de Compra</div>
              <!-- CUERPO DE LA CARTA -->
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class = "form-group"> <!-- id -->
                    <label for="cestaID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $cestaID; ?>" name="cestaID" id="cestaID" placeholder="ID">
                  </div>

                  <div class = "form-group"> <!-- nombre -->
                    <label for="cestaName">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $cestaName; ?>" name="cestaName" id="cestaName" placeholder="Name">
                  </div>

                  <div class = "form-group"> <!-- imagen -->
                    <label for="cestaImagen">Imagen:</label>
                    <br>
                    <!-- MOSTRAR LA IMAGEN -->
                    <?php if($cestaImagen != "") { ?>
                        <img class="imG rounded" src="../img/cesta-compra/<?php echo $cestaImagen; ?>" width="60" alt="" srcset="">
                    <?php } ?>

                    <input type="file" class="form-control"  name="cestaImagen" id="cestaImagen" placeholder="Añadir una imagen">
                  </div>

                  <div class="form-group"> <!-- precio -->
                    <label for="cestaPrice">Precio:</label>
                    <input type="number" step="0.01" required class="form-control" value="<?php echo htmlspecialchars($cestaPrice); ?>" name="cestaPrice" id="cestaPrice" placeholder="Precio">
                  </div>
                
                  <br>
                  <div class="btn-group" role="group" aria-label=""> <!-- botones -->
                    <button type="submit" name="cestaAccion" <?php echo ($cestaAccion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="cestaAccion" <?php echo ($cestaAccion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="cestaAccion" <?php echo ($cestaAccion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                  </div>
                </form>
              </div> <!-- card-body -->
            </div> <!-- card -->
            <br>
          </div>

          <!-- MOSTRAR LOS DATOS EN UNA TABLA -->
          <div class="col-md-7 table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Imagen</th>
                  <th>Precio</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            <tbody>
              <?php foreach($listaCompra as $compra) { ?>
              <tr>
                <td><?php echo $compra['id']; ?></td>
                <td><?php echo $compra['name']; ?></td>
                <td>
                  <!-- MOSTRAR LA IMAGEN -->
                  <img width="250px" id="img-cesta" class="img rounded" src="../img/cesta-compra/<?php echo $compra['image']; ?>" alt="">
                </td>
                <td><?php echo $compra['price']; ?></td>
                
                <td>
                  <form method="post">
                    <input type="hidden" name="cestaID" id="cestaID" value="<?php echo $compra['id']; ?>" />
                    <input type="submit" name="cestaAccion" value="Seleccionar" class="btn btn-primary" />
                    <input type="submit" name="cestaAccion" value="Borrar" class="btn btn-danger" />
                  </form>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <br><br><br>
      <div class="container"> <!-- DATOS DE LAS COMPRAS -->
        <div class="section-title">
          <h3 id="pagos">Pago Realizado</h3>
        </div>

        <div class="row"> 
          <div class="col-md-5">
            <div class="card">
              <!-- CABECERA DE LA CARTA -->
              <div class="card-header">Datos de las Compras Realizadas</div>
              <!-- CUERPO DE LA CARTA -->
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class = "form-group"> <!-- id -->
                    <label for="pagoID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $pagoID; ?>" name="pagoID" id="pagoID" placeholder="ID">
                  </div>
                  <div class = "form-group"> <!-- titular -->
                    <label for="pagoTitular">Titular:</label>
                    <input type="text" required class="form-control" value="<?php echo $pagoTitular; ?>" name="pagoTitular" id="pagoTitular" placeholder="Titular">
                  </div>
                  <div class = "form-group"> <!-- cuenta -->
                    <label for="pagoNumero">Número de tarjeta:</label>
                    <input type="text" required class="form-control" value="<?php echo $pagoNumero; ?>" name="pagoNumero" id="pagoNumero" placeholder="Número de tarjeta válida" maxlength="16">
                  </div>
                  <div class = "form-group"> <!-- codigo -->
                    <label for="codigoCVC">Código:</label>
                    <input type="text" class="form-control" value="<?php echo $codigoCVC; ?>" name="codigoCVC" id="codigoCVC" placeholder="CVC" maxlength="3">
                  </div>
                  <div class = "form-group"> <!-- fecha -->
                    <label for="fechaExp">Fecha de Expedición:</label>
                    <input type="date" class="form-control" value="<?php echo $fechaExp; ?>" name="fechaExp" id="fechaExp" placeholder="YYYY-MM-DD">
                  </div>
                  <div class = "form-group"> <!-- hora -->
                    <label for="pagoHora">Hora:</label>
                    <input type="time" class="form-control" value="<?php echo $pagoHora; ?>" name="pagoHora" id="pagoHora" placeholder="00:00">
                  </div>     
                  <div class="form-group"> <!-- user -->
                    <label for="pagoUser">Usuario:</label>
                    <select class="form-control" name="pagoUser" id="pagoUser">
                      <?php
                      $sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE NOT id=1;");
                      $sentenciaSQL->execute();
                      $listaUsuario = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

                      foreach ($listaUsuario as $usuario) {
                        echo '<option value="' . $usuario['id'] . '"';
                          if ($usuario['username'] == $pagoUser) {
                            echo ' selected';
                          }
                        echo '>' . $usuario['username'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
      

                  <br>
                  <div class="btn-group" role="group" aria-label=""> <!-- botones -->
                    <button type="submit" name="pagoAccion" <?php echo ($pagoAccion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="pagoAccion" <?php echo ($pagoAccion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="pagoAccion" <?php echo ($pagoAccion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                  </div>
                </form>
              </div> <!-- card-body -->
            </div> <!-- card -->
            <br>
          </div>

          <!-- MOSTRAR LOS DATOS EN UNA TABLA -->
          <div class="col-md-7 table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titular</th>
                  <th>Número de Tarjeta</th>
                  <th>CVC</th>
                  <th>Fecha Expedición</th>
                  <th>Hora</th>
                  <th>Usuario</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            <tbody>
              <?php foreach($listaPagos as $pagos) { ?>
              <tr>
                <td><?php echo $pagos['id']; ?></td>
                <td><?php echo $pagos['titular']; ?></td>
                <td><?php echo $pagos['numeroCuenta']; ?></td>
                <td><?php echo $pagos['codigo']; ?></td>
                <td><?php echo $pagos['fechaExp']; ?></td>
                <td><?php echo $pagos['hora']; ?></td>
                <td><?php echo $pagos['idUser']; ?></td>
                
                <td>
                  <form method="post">
                    <input type="hidden" name="pagoID" id="pagoID" value="<?php echo $pagos['id']; ?>" />
                    <input type="submit" name="pagoAccion" value="Seleccionar" class="btn btn-primary" />
                    <input type="submit" name="pagoAccion" value="Borrar" class="btn btn-danger" />
                  </form>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section> <!-- End Admin -->
  </main><!-- End Main -->

  <!-- Exportar el PIE de la página -->
  <?php include("template/footer.php"); ?>
</body>

</html>