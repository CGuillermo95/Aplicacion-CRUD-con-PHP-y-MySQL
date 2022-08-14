<?php
include("conexion.php");
$proveedor = '';
$producto = '';
$descripcion = '';
$preciocosto = '';
$precioventa ='';
$cantidad = '';

if  (isset($_GET['id']))
{
  $id = $_GET['id'];
  $query = "SELECT * FROM productos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1)
  {
    $row = mysqli_fetch_array($result);
    $proveedor = $row['proveedor'];
    $producto = $row['producto'];
    $descripcion = $row['descripcion'];
    $preciocosto = $row['preciocosto'];
    $precioventa = $row['precioventa'];
    $cantidad = $row['cantidad'];
  }
}

if (isset($_POST['update']))
{
  $id = $_GET['id'];
  $proveedor = $_POST['proveedor'];
  $producto = $_POST['producto'];
  $descripcion = $_POST['descripcion'];
  $preciocosto = $_POST['preciocosto'];
  $precioventa = $_POST['precioventa'];
  $cantidad = $_POST['cantidad'];

  $query = "UPDATE productos set proveedor = '$proveedor', producto = '$producto', descripcion = '$descripcion', preciocosto = '$preciocosto', precioventa = '$precioventa', cantidad = '$cantidad' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Datos actuaizados';
  $_SESSION['message_type'] = 'warning';
  header('Location: admin.php');
}

if (isset($_POST['inicio']))
{
  $_SESSION['message'] = 'Cancelado';
  $_SESSION['message_type'] = 'warning';
  header('Location: admin.php');
}
?>



<?php include('includes/encabezadoUpdate.php'); ?><div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="modificar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <label>PROVEEDOR</label>
          <select name="proveedor" class="form-control" value="<?php echo $proveedor; ?>">
          <option value="Kingston" >Kingston</option>
          <option value="Adata">Adata</option>
          <option value="Seagate">Seagate</option>
          <option value="Etouch">Etouch</option>
          <option value="Redragon">Redragon</option>
        </select>
      </div>
      
      <div class="form-group">
        <label>PRODUCTO</label>
          <input name="producto" type="text" class="form-control" value="<?php echo $producto; ?>" placeholder="Nomdre Producto">
        </div>
        
        <div class="form-group">
          <label>DESCRIPCIÓN</label>
          <textarea name="descripcion" class="form-control" cols="30" rows="2" placeholder="Descripción"><?php echo $descripcion;?></textarea>
        </div>
        
        <div class="form-group">
          <label>PRECIO COSTO</label>
          <input type="number" name="preciocosto" class="form-control" placeholder="Precio Costo" value="<?php echo $preciocosto; ?>">
        </div>

        <div class="form-group">
          <label>PRECIO VENTA</label>
          <input type="number" name="precioventa" class="form-control" placeholder="Precio Venta" value="<?php echo $precioventa; ?>">
        </div>

        <div class="form-group">
          <label>CANTIDAD</label>
          <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" value="<?php echo $cantidad; ?>">
        </div>
        <button class="btn-success" name="update">
          MODIFICAR
        </button>

        <form method="get" action="admin.php">
        <button class="btn-success" name="inicio">
          CANCELAR
        </button>
      </form>
      </form>
      
    </div>
  </div>
</div>
</div>
<?php include('includes/pie.php'); ?>
