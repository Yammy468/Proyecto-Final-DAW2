<?php
// RECOGER LOS DATOS DEL FORMULARIO Y GUARDARLO
$userID=(isset($_POST['userID'])) ? $_POST['userID'] : "";
$userName=(isset($_POST['userName'])) ? $_POST['userName'] : "";
$userSurname=(isset($_POST['userSurname'])) ? $_POST['userSurname'] : "";
$userUsername=(isset($_POST['userUsername'])) ? $_POST['userUsername'] : "";
$userPassword=(isset($_POST['userPassword'])) ? $_POST['userPassword'] : "";
$userEmail=(isset($_POST['userEmail'])) ? $_POST['userEmail'] : "";
$userAccion=(isset($_POST['userAccion'])) ? $_POST['userAccion'] : "";

// OPCIONES DE LA VARIABLE 'userAccion'
switch($userAccion) {
  // AGREGAR
  case "Agregar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("INSERT INTO usuarios (name, surname, username, password, email) VALUES (:name, :surname, :username, md5(:password), :email);");
    $sentenciaSQL->bindParam(':name', $userName);
    $sentenciaSQL->bindParam(':surname', $userSurname);
    $sentenciaSQL->bindParam(':username', $userUsername);
    $sentenciaSQL->bindParam(':password', $userPassword);
    $sentenciaSQL->bindParam(':email', $userEmail);

    $sentenciaSQL->execute(); // Ejecutar la sentencia

    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;


  // MODIFICAR
  case "Modificar": 
    // PREPARAR LA SENTENCIA 1
    $sentenciaSQL = $conexion->prepare("UPDATE usuarios SET name=:name, surname=:surname, username=:username, password=md5(:password), email=:email WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$userID);
    $sentenciaSQL->bindParam(':name',$userName);
    $sentenciaSQL->bindParam(':surname',$userSurname);
    $sentenciaSQL->bindParam(':username',$userUsername);
    $sentenciaSQL->bindParam(':password',$userPassword);
    $sentenciaSQL->bindParam(':email',$userEmail);
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
    $sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$userID);
    $sentenciaSQL->execute();
    // RECUPERAR LOS DATOS NECESARIO (SOLO LO NECESARIO), NO EN UN 'array'
    $usuario = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    // Definir los NUEVOS VALORES de la variable
    $userName = $usuario['name'];
    $userSurname = $usuario['surname'];
    $userUsername = $usuario['username'];
    $userPassword = $usuario['password'];
    $userEmail = $usuario['email'];
    break;

  // BORRAR
  case "Borrar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $userID);
    $sentenciaSQL->execute(); 
      
    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listaUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>