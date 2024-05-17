<?php
// CONECTAR A LA BASE DE DATOS
function conectar() {
    $host="localhost";
    $bd="dentshiney";
    $usuario="root";
    $contrasena = "";

    $conexion = new PDO("mysql:host=$host; dbname=$bd", $usuario, $contrasena);
   
    return $conexion;
}

function consultarUsers($usuario, $password) {
    $conexion = conectar();

    // Realiza la consulta
    $consulta = mysqli_query($conexion, "SELECT username FROM usuarios " . "WHERE username='$usuario' " . "AND password='" . md5($password) . "'");

    return $consulta;
}

function logout() {
    // Y la eliminamos
    session_unset();
    session_destroy();
    header("Location: ../index.php"); 
}
?>