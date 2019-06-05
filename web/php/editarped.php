
<html>
	<head>
		<title>Service</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
		<script src="../js/jquery.min.js"></script>
	</head>
	<body style="background-color:#ffffff;">
	<?php include "navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Editar</h2>
<?php
include "conexion.php";

$sql1= "select * from pedidos where cod_interno = ".$_GET["id"];
$query = $con->query($sql1);
$pedidos = null;

if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $pedidos=$r;
  break;
}

  }


?>

<?php if($pedidos!=null):?>

<form role="form" method="post" action="uppedido.php">
  <div class="form-group">
    <label for="falla">Falla</label>
    <input type="text" class="form-control" value="<?php echo $pedidos->falla; ?>" name="falla" >
  </div>
  <div class="form-group">
    <label for="obs">Observacion</label>
    <input type="text" class="form-control" value="<?php echo $pedidos->observaciones; ?>" name="obs" >
  </div>
  <div class="form-group">
    <label for="estado">Estado</label>
    <select class="form-control" name="estado" required>
    <option value="en reparación">en reparacion</option>
	<option value="listo para despachar">listo para despachar</option>	
    </select>
  </div>
  <input type="hidden"  name="id" value="<?php echo $pedidos->cod_interno; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>

</div>
</div>
</div>

<script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>