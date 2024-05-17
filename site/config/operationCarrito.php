<?php
$id = (isset($_POST['id'])) ? $_POST['id'] : "";
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "";
$btnAccion = (isset($_POST['botonAccion'])) ? $_POST['botonAccion'] : "";

// OPCIONES DE LA VARIABLE 'btnAccion'
switch($btnAccion) {
  case 'Agregar': // AGREGAR PRODUCTO A LA CESTA DE COMPRA de 1 en 1
    if (is_numeric($id) && is_string($nombre) && is_numeric($precio) && is_numeric($cantidad)) {
      if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
      }

      $encontrado = false;
      foreach ($_SESSION['carrito'] as &$producto) { // Uso de & para modificar directamente el array
        if ($producto['ID'] == $id) {
          $producto['CANTIDAD'] += $cantidad;
          $mensaje = "Cantidad actualizada en el carrito";
          $encontrado = true;
          break;
        }
      }
      unset($producto); // Rompe la referencia con el último elemento

      if (!$encontrado) {
        $_SESSION['carrito'][] = array(
          'ID' => $id,
          'NOMBRE' => $nombre,
          'PRECIO' => $precio,
          'CANTIDAD' => $cantidad
        );
        $mensaje = "Producto agregado al carrito";
      }
    } else {
      $mensaje = "Verifique los datos del producto";
    }
  break;

  case "Eliminar": // ELIMINAR PRODUCTO DE LA CESTA DE COMPRA de 1 en 1
    if (is_numeric($id)) {
      foreach ($_SESSION['carrito'] as $indice => &$producto) {
        if ($producto['ID'] == $id) {
          $producto['CANTIDAD']--;
          if ($producto['CANTIDAD'] <= 0) {
            unset($_SESSION['carrito'][$indice]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexa el array después de eliminar un item
            $mensaje = "Producto eliminado del carrito";
          } else {
            $mensaje = "Cantidad del producto reducida";
          }
          break;
        }
      }
      unset($producto); // Rompe la referencia con el último elemento
    } else {
      $mensaje = "ID incorrecto";
    }
  break;
}
?>