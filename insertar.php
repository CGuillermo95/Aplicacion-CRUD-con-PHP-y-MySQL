<?php

include('conexion.php');

if (isset($_POST['save_task'])) {
  $proveedor = $_POST['proveedor'];
  $producto= $_POST['producto'];
  $descripcion = $_POST['descripcion'];
  $preciocosto = $_POST['preciocosto'];
  $precioventa = $_POST['precioventa'];
  $cantidad = $_POST['cantidad'];

  $query = "INSERT INTO productos(proveedor, producto, descripcion, preciocosto, precioventa, cantidad) VALUES ('$proveedor', '$producto', '$descripcion', '$preciocosto', '$precioventa', '$cantidad')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto Insertado';
  $_SESSION['message_type'] = 'success';
  header('Location: admin.php');
}

?>