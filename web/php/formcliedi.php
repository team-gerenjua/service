<?php
include "conexion.php";


$sql1= "select * from clientes where dni = ".$_GET["dni"];
$viejodni= $_GET['dni'];

$query = $con->query($sql1);

$clientes = null;

if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $clientes=$r;
  break;
}

  }


?>

<?php if($clientes!=null):?>

<form role="form" method="post" action="upcliente.php">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $clientes->nombre; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="lastname">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $clientes->apellido; ?>" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="address">Dni</label>
    <input type="number" class="form-control" value="<?php echo $clientes->dni; ?>" name="dni" required>
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $clientes->telefono; ?>" name="telefono" >
  </div>
  <input type="hidden" class="form-control" value="<?php echo $viejodni; ?>" name="viejodni">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>
