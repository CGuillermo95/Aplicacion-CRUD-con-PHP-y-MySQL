<?php

include("conexion.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM productos WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("La consulta fallo");
  }

  $_SESSION['message'] = 'Producto eliminado exitosamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
