<?php
// RECOGER LOS DATOS DEL FORMULARIO Y GUARDARLO
$cestaID=(isset($_POST['cestaID'])) ? $_POST['cestaID'] : "";
$cestaName=(isset($_POST['cestaName'])) ? $_POST['cestaName'] : "";
$cestaImagen=(isset($_FILES['cestaImagen']['name'])) ? $_FILES['cestaImagen']['name'] : "";
$cestaPrice=(isset($_POST['cestaPrice'])) ? $_POST['cestaPrice'] : "";
$cestaAccion=(isset($_POST['cestaAccion'])) ? $_POST['cestaAccion'] : "";

$txtPrice = filter_input(INPUT_POST, 'cestaPrice', FILTER_VALIDATE_FLOAT);
if ($cestaPrice === false) {
  // Manejo adicional de error o establecer txtPrice a un valor por defecto o nulo
  echo "El precio introducido no es válido.";
}

// OPCIONES DE LA VARIABLE 'accion'
switch($cestaAccion) {
  // AGREGAR
  case "Agregar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("INSERT INTO `cesta-compra` (name, image, price) VALUES (:name, :image, :price);");
    $sentenciaSQL->bindParam(':name', $cestaName);
    $sentenciaSQL->bindParam(':price', $cestaPrice);

    // CREAR y GUARDAR la FECHA ACTUAL
    $fecha = new DateTime();
    // CREAR nuevo nombre Imagen 
    $nombreArchivo = ($cestaImagen != "") ? $fecha->getTimestamp(). "_". $_FILES["cestaImagen"]["name"] : "imagen.jpg";

    // OBTENER la ruta 'temporal' de las imagen subida
    $tmpImagen = $_FILES["cestaImagen"]["tmp_name"];
    if($tmpImagen != "") {
      // Y CAMBIARLO/MOVERLO a la nueva ruta asignada
      move_uploaded_file($tmpImagen, "../img/cesta-compra/". $nombreArchivo);
    }

    $sentenciaSQL->bindParam(':image', $nombreArchivo);
    $sentenciaSQL->execute(); // Ejecutar la sentencia

    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;


  // MODIFICAR
  case "Modificar": 
    // PREPARAR LA SENTENCIA 1
    $sentenciaSQL = $conexion->prepare("UPDATE `cesta-compra` SET name=:name, price=:price WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$cestaID);
    $sentenciaSQL->bindParam(':name',$cestaName);
    $sentenciaSQL->bindParam(':price',$cestaPrice);
    $sentenciaSQL->execute();

    if($cestaImagen != "") {
      // CREAR y GUARDAR la FECHA ACTUAL
      $fecha = new DateTime();
      // CREAR el nombre de la Imagen 
      $nombreArchivo = ($cestaImagen != "") ? $fecha->getTimestamp(). "_". $_FILES["cestaImagen"]["name"] : "imagen.jpg";

      // OBTENER la ruta 'temporal' de las imagen subido
      $tmpImagen = $_FILES["cestaImagen"]["tmp_name"];
      // Y CAMBIARLO/MOVERLO a la nueva ruta asignada
      move_uploaded_file($tmpImagen, "../img/cesta-compra/". $nombreArchivo);

      // PREPARAR una sentencia para seleccionar la 'imagen' según el ID
      $sentenciaSQL = $conexion->prepare("SELECT image FROM `cesta-compra` WHERE id=:id");
      $sentenciaSQL->bindParam(':id',$cestaID);
      $sentenciaSQL->execute();
      // RECUPERAR LOS DATOS NECESARIO (SOLO LO NECESARIO), NO EN UN 'array'
      $cesta = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

      // SI LA IMAGEN EXISTE, A LA HORA DE BORRARLO SE ELIMINA TAMBIEN LA IMAGEN DE LA CARPETA 'img/'
      if( isset($cesta["image"]) && ($cesta["image"] != "imagen.jpg") ) {
        if(file_exists("../img/cesta-compra/". $cesta["image"])) {
          unlink("../img/cesta-compra/". $cesta["image"]);
        }
      }

      // PREPARAR LA SENTENCIA 2
      $sentenciaSQL = $conexion->prepare("UPDATE `cesta-compra` SET image=:imagen WHERE id=:id");
      $sentenciaSQL->bindParam(':id',$cestaID);
      $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
      $sentenciaSQL->execute(); 
    }

    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;


  // CANCELAR
  case "Cancelar": 
    // RECARGAR/REDIRIGIR LA PÁGINA A 'productos.php'
    header("Location: admin.php");
    break;


  // SELECCIONAR
  case "Seleccionar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("SELECT * FROM `cesta-compra` WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$cestaID);
    $sentenciaSQL->execute();
    // RECUPERAR LOS DATOS NECESARIO (SOLO LO NECESARIO), NO EN UN 'array'
    $cesta = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    // Definir los NUEVOS VALORES de la variable
    $cestaName = $cesta['name'];
    $cestaImagen = $cesta['cesta'];
    $cestaPrice = $cesta['price'];
    break;


  // BORRAR
  case "Borrar": 
    // PREPARAR una sentencia para seleccionar la 'imagen' según el ID
    $sentenciaSQL = $conexion->prepare("SELECT image FROM `cesta-compra` WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$cestaID);
    $sentenciaSQL->execute();
    // RECUPERAR LOS DATOS NECESARIO (SOLO LO NECESARIO), NO EN UN 'array'
    $cesta = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    // SI LA IMAGEN EXISTE, A LA HORA DE BORRARLO SE ELIMINA TAMBIEN LA IMAGEN DE LA CARPETA 'img/'
    if( isset($cesta["image"]) && ($cesta["image"] != "imagen.jpg") ) {
      if(file_exists("../img/cesta-compra/". $cesta["image"])) {
        unlink("../img/cesta-compra/". $cesta["image"]);
      }
    }

    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("DELETE FROM `cesta-compra` WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $cestaID);
    $sentenciaSQL->execute(); 
    
    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM `cesta-compra`");
$sentenciaSQL->execute();
$listaCompra = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>