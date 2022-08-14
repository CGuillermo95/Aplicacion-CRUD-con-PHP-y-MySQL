<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'dbproductos'
)or die(mysqli_erro($mysqli));

/*if(isset($conn))
{
    echo "CONECTADO";
}*/
?>
