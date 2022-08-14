<?php include("conexion.php"); ?>

<?php include('includes/encabezadocliente.php'); ?>

<main class="container p-5">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

    </div>
    <div>
      <table class="table table-bordered">
        <thead>
          <tr style="background-color: rgb(171, 235, 198);">
            <th >Marca</th>
            <th>Nombre</th>
            <th>Descripción</th>        
            <th>Precio</th>            
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM productos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr style="background-color: rgb(253, 254, 254);">
            <td><?php echo $row['proveedor']; ?></td>
            <td><?php echo $row['producto']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precioventa']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('includes/piecliente.php'); ?>