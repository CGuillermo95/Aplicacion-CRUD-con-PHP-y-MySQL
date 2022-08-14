<?php include("conexion.php"); ?>

<?php include('includes/encabezado.php'); ?>

<main class="container p-4">
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
      
      <div class="card card-body">
        <form action="insertar.php" method="POST">
          <div class="form-group">
            <label>PROVEEDOR</label>
            <select name="proveedor" class="form-control">
              <option value="Kingston" >Kingston</option>
              <option value="Adata">Adata</option>
              <option value="Seagate">Seagate</option>
              <option value="Etouch">Etouch</option>
              <option value="Redragon">Redragon</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>PRODUCTO</label>
            <input type="text" name="producto" class="form-control" placeholder="Nombre producto" autofocus required>
          </div>
          
          <div class="form-group">
            <label>DESCRIPCIÓN</label>
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción" required></textarea>
          </div>
      
          <div class="form-group">
            <label>PRECIO COSTO</label>
            <input type="number" name="preciocosto" class="form-control" placeholder="Precio Costo" required>
          </div>

          <div class="form-group">
            <label>PRECIO VENTA</label>
            <input type="number" name="precioventa" class="form-control" placeholder="Precio Venta" required>
          </div>

          <div class="form-group">
            <label>CANTIDAD</label>
            <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" required>
          </div>
          
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="INSERTAR">
        </form>
      </div>
    </div>
    
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr style="background-color: rgb(171, 235, 198);">
            <th>Proveedor</th>
            <th>Nombre</th>
            <th>Descripción</th>        
            <th>Precio Costo</th>
            <th>Precio Venta</th>  
            <th>Cantidad</th>  
            <th>Fecha de Registro</th>
            <th>Acción</th>
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
            <td><?php echo $row['preciocosto']; ?></td>
            <td><?php echo $row['precioventa']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['fechamodificacion']; ?></td>
            <td>
              <a href="modificar.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
              <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('includes/pie.php'); ?>
