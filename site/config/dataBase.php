<?php
require_once('funciones.inc');
require_once('user.php');

class dataBase {
  protected static function ejecutarConsulta($sql) {
    try {
      $conexion = conectar();
      $resultado = null;
      if (isset($conexion))
      $resultado = $conexion->query($sql);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
    return $resultado;
  }

  public static function verificarUsuario($usuario, $contrasena) {
    $sentenciaSQL = "SELECT username FROM usuarios " . "WHERE username='$usuario' " . "AND password='" . md5($contrasena) . "'";
    $resultado = self::ejecutarConsulta($sentenciaSQL);
    $verificado = false;

    if (isset($resultado)) {
      $row = $resultado->fetch();
      if ($row !== false)
        $verificado = true;
    }
    return $verificado;
  }

  public static function selectUsuarioId($user) {
    $conexion = conectar();
    $resultado = $conexion->prepare("SELECT id FROM usuarios WHERE username=:username");

    $resultado->bindParam(':username', $user, PDO::PARAM_STR);
    
    $resultado->execute();

    // Obtener el resultado
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);

    // Devolver el resultado
    return $fila['id']; // Aquí devuelvo solo el valor del ID
  }

  public static function verificarUsuarioRepetido($nombre, $apellido) {
    $conexion = conectar();
    $resultado = $conexion->prepare("SELECT name, surname FROM usuarios WHERE name=:name AND surname=:surname;");
    $verificado = false;

    $resultado->bindParam(':name', $nombre);
    $resultado->bindParam(':surname', $apellido);

    $resultado->execute();

    // Verificamos si hay filas devueltas
    return $resultado->rowCount() > 0;
  }

  public static function anadirUsuarios($nombre, $apellido, $usuario, $contrasena, $email) {
    $conexion = conectar();
    $resultado = $conexion->prepare("INSERT INTO usuarios (name, surname, username, password, email) VALUES (:name, :surname, :username, :password, :email);");
    
    $resultado->bindParam(':name', $nombre);
    $resultado->bindParam(':surname', $apellido);
    $resultado->bindParam(':username', $usuario);
    $resultado->bindParam(':password', $contrasena);
    $resultado->bindParam(':email', $email);

    $resultado->execute();

    return $resultado;
  }

  public static function anadirComentario($nombre, $email, $web, $comentario, $guardar) {
    $conexion = conectar();
    $resultado = $conexion->prepare("INSERT INTO blog (name, email, web, comment, save) VALUES (:name, :email, :web, :comment, :save);");
    
    $resultado->bindParam(':name', $nombre);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':web', $web);
    $resultado->bindParam(':comment', $comentario);
    $resultado->bindParam(':save', $guardar, PDO::PARAM_BOOL);

    $resultado->execute();

    return $resultado;
  }

  public static function anadirPagoFinalizado($nombre, $numCuenta, $fecha, $codigo, $hora, $user) {
    $conexion = conectar();
    $resultado = $conexion->prepare("INSERT INTO `cuenta-bancaria` (titular, numeroCuenta, fechaExp, codigo, hora, idUser) VALUES (:titular, :numeroCuenta, :fechaExp, :codigo, :hora, :idUser);");
    
    $resultado->bindParam(':titular', $nombre);
    $resultado->bindParam(':numeroCuenta', $numCuenta);
    $resultado->bindParam(':fechaExp', $fecha);
    $resultado->bindParam(':codigo', $codigo);
    $resultado->bindParam(':hora', $hora);
    $resultado->bindParam(':idUser', $user);

    $resultado->execute();

    return $resultado;
  }
}
?>