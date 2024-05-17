<?php
// RECOGER LOS DATOS DEL FORMULARIO Y GUARDARLO
$blogID=(isset($_POST['blogID'])) ? $_POST['blogID'] : "";
$blogName=(isset($_POST['blogName'])) ? $_POST['blogName'] : "";
$blogEmail=(isset($_POST['blogEmail'])) ? $_POST['blogEmail'] : "";
$blogWeb=(isset($_POST['blogWeb'])) ? $_POST['blogWeb'] : "";
$blogComment=(isset($_POST['blogComment'])) ? $_POST['blogComment'] : "";
$blogSave = (isset($_POST['blogSave'])) ? 1 : 0; // Si blogSave está marcado, será 1, de lo contrario, será 0
$blogAccion=(isset($_POST['blogAccion'])) ? $_POST['blogAccion'] : "";

// OPCIONES DE LA VARIABLE 'blogAccion'
switch($blogAccion) {
  // AGREGAR
  case "Agregar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("INSERT INTO blog (name, email, web, comment, save) VALUES (:name, :email, :web, :comment, :save);");
    $sentenciaSQL->bindParam(':name', $blogName);
    $sentenciaSQL->bindParam(':email', $blogEmail);
    $sentenciaSQL->bindParam(':web', $blogWeb);
    $sentenciaSQL->bindParam(':comment', $blogComment);
    $sentenciaSQL->bindParam(':save', $blogSave, PDO::PARAM_BOOL);

    $sentenciaSQL->execute(); // Ejecutar la sentencia

    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;


  // MODIFICAR
  case "Modificar": 
    // PREPARAR LA SENTENCIA 1
    $sentenciaSQL = $conexion->prepare("UPDATE blog SET name=:name, email=:email, web=:web, comment=:comment, save=:save WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$blogID);
    $sentenciaSQL->bindParam(':name', $blogName);
    $sentenciaSQL->bindParam(':email', $blogEmail);
    $sentenciaSQL->bindParam(':web', $blogWeb);
    $sentenciaSQL->bindParam(':comment', $blogComment);
    $sentenciaSQL->bindParam(':save', $blogSave);
    $sentenciaSQL->execute();

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
    $sentenciaSQL = $conexion->prepare("SELECT * FROM blog WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$blogID);
    $sentenciaSQL->execute();
    // RECUPERAR LOS DATOS NECESARIO (SOLO LO NECESARIO), NO EN UN 'array'
    $comentario = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    // Definir los NUEVOS VALORES de la variable
    $blogName = $comentario['name'];
    $blogEmail = $comentario['email'];
    $blogWeb = $comentario['web'];
    $blogComment = $comentario['comment'];
    $blogSave = $comentario['save'];
    break;


  // BORRAR
  case "Borrar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("DELETE FROM blog WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $blogID);
    $sentenciaSQL->execute(); 
    
    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM blog");
$sentenciaSQL->execute();
$listaComentarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>