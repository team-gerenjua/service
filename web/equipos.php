<?php
include "php/conexion.php";
?>
<html>
	<head>
		<title>Service</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<body style="background-color:#ffffff;">
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Lista de Equipos</h2>
<a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar Equipos</a>
<br> <br>
<?php
	$user_id=null;
$sql1= "select * from equipos";
$query = $con->query($sql1);
if($query->num_rows>0):
?>
<table class="table table-bordered table-hover">
<thead>
	<th>Modelo</th>
	<th>Codigo de Serie</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["modelo"]; ?></td>
	<td><?php echo $r["cod_serie"]; ?></td>
	<td style="width:190px;">
		<a href="php/delequipo.php?id=<?php echo $r["id_equipo"];?>" class="btn btn-sm btn-danger">Eliminar</a>
	</td>
</tr>
<?php 
	endwhile; 
	else:
?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Equipo</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" action="php/agregarequipo.php">
  <div class="form-group">
    <label for="descrip">Modelo</label>
    <input type="text" class="form-control" name="modelo" required>
  </div>
  <div class="form-group">
    <label for="descrip">Codigo de Serie</label>
    <input type="text" class="form-control" name="cod" required>
  </div>
  <button type="submit" class="btn btn-default">Agregar</button>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>