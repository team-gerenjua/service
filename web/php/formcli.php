<?php
include "conexion.php";
?>
<html>
	<head>
		<title>Service</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
		<script src="../js/jquery.min.js"></script>
	</head>
	<?php include "navbar.php"; 
  include "conexion.php";
  ?>
<body style="background-color:#ffffff;">
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Nuevo Cliente</h2>
<form role="form" method="post" action="agregarcli.php">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="lastname">Apellido</label>
    <input type="text" class="form-control" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="address">Dni</label>
    <input type="number" class="form-control" name="dni" required>
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" name="telefono" >
  </div>
  <button type="submit" class="btn btn-default">Agregar</button>
</form>
</div>
</div>
</div>
	</body>
</html>
	
