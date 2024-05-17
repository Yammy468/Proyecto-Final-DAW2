<?php
// RECOGER LOS DATOS DEL FORMULARIO Y GUARDARLO
$pagoID=(isset($_POST['pagoID'])) ? $_POST['pagoID'] : "";
$pagoTitular=(isset($_POST['pagoTitular'])) ? $_POST['pagoTitular'] : "";
$pagoNumero=(isset($_POST['pagoNumero'])) ? $_POST['pagoNumero'] : "";
$codigoCVC=(isset($_POST['codigoCVC'])) ? $_POST['codigoCVC'] : "";
$fechaExp=(isset($_POST['fechaExp'])) ? $_POST['fechaExp'] : "";
$pagoHora=(isset($_POST['pagoHora'])) ? $_POST['pagoHora'] : "";
$pagoUser=(isset($_POST['pagoUser'])) ? $_POST['pagoUser'] : "";
$pagoAccion=(isset($_POST['pagoAccion'])) ? $_POST['pagoAccion'] : "";

// OPCIONES DE LA VARIABLE 'pagoAccion'
switch($pagoAccion) {
  // AGREGAR
  case "Agregar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("INSERT INTO `cuenta-bancaria` (titular, numeroCuenta, codigo, fechaExp, hora, idUser) VALUES (:titular, :numeroCuenta, :codigo, :fechaExp, :hora, :idUser);");
    $sentenciaSQL->bindParam(':titular', $pagoTitular);
    $sentenciaSQL->bindParam(':numeroCuenta', $pagoNumero);
    $sentenciaSQL->bindParam(':codigo', $codigoCVC);
    $sentenciaSQL->bindParam(':fechaExp', $fechaExp);
    $sentenciaSQL->bindParam(':hora', $pagoHora);
    $sentenciaSQL->bindParam(':idUser', $pagoUser);

    $sentenciaSQL->execute(); // Ejecutar la sentencia

    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;


  // MODIFICAR
  case "Modificar": 
    // PREPARAR LA SENTENCIA 1
    $sentenciaSQL = $conexion->prepare("UPDATE `cuenta-bancaria` SET titular=:titular, numeroCuenta=:numeroCuenta, codigo=:codigo, fechaExp=:fechaExp, hora=:hora, idUser=:idUser WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$pagoID);
    $sentenciaSQL->bindParam(':titular', $pagoTitular);
    $sentenciaSQL->bindParam(':numeroCuenta', $pagoNumero);
    $sentenciaSQL->bindParam(':codigo', $codigoCVC);
    $sentenciaSQL->bindParam(':fechaExp', $fechaExp);
    $sentenciaSQL->bindParam(':hora', $pagoHora);
    $sentenciaSQL->bindParam(':idUser', $pagoUser);
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
    $sentenciaSQL = $conexion->prepare("SELECT * FROM `cuenta-bancaria` WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$pagoID);
    $sentenciaSQL->execute();
    // RECUPERAR LOS DATOS NECESARIO (SOLO LO NECESARIO), NO EN UN 'array'
    $pagos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    // Definir los NUEVOS VALORES de la variable
    $pagoTitular = $pagos['titular'];
    $pagoNumero = $pagos['numeroCuenta'];
    $codigoCVC = $pagos['codigo'];
    $fechaExp = $pagos['fechaExp'];
    $pagoHora = $pagos['hora'];
    $pagoUser = $pagos['idUser'];
    break;


  // BORRAR
  case "Borrar": 
    // PREPARAR LA SENTENCIA
    $sentenciaSQL = $conexion->prepare("DELETE FROM `cuenta-bancaria` WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $pagoID);
    $sentenciaSQL->execute(); 
    
    // RECARGAR LA PÁGINA
    header("Location: admin.php");
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM `cuenta-bancaria`");
$sentenciaSQL->execute();
$listaPagos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>