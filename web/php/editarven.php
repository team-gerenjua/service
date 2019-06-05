
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

$sql1= "select * from vendedores where id_part = ".$_GET["id"];
$query = $con->query($sql1);
$vendedores = null;

if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $vendedores=$r;
  break;
}

  }


?>

<?php if($vendedores!=null):?>

<form role="form" method="post" action="upvendedor.php">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $vendedores->nombre_part; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="lastname">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $vendedores->ape_part; ?>" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $vendedores->telefono_part; ?>" name="telefono" required>
  </div>
  <div class="form-group">
    <label for="adress">Correo</label>
    <input type="email" class="form-control" value="<?php echo $vendedores->correo_part; ?>" name="correo" >
  </div>
  <input type="hidden" class="form-control" value="<?php echo $vendedores->id_part; ?>" name="id">
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