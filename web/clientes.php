
<html>
	<head>
		<title>Service</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<?php include "php/navbar.php"; 
  include "php/conexion.php";
  ?>
<body style="background-color:#ffffff;">
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Lista Clientes</h2>
  <a href="php/formcli.php" class="btn btn-default">Agregar</a>
  <form class="navbar-form navbar-right" role="search" action="buscarcli.php">
     <a data-toggle="modal" href="#fecha" class="btn btn-default">Buscar por Fecha</a>
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar por Datos">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
	</form>
<br><br>
<?php include "php/tabla.php"; ?>
</div>
</div>
</div>

<!-- Modal -->
  <div class="modal fade" id="fecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Ingresar fecha inicial y final</h4>
        </div>
        <div class="modal-body">
<form role="form" method="get" action="fecha.php">
  <div class="form-group">
    <label for="fi">Fecha Inicial</label>
    <input type="date" class="form-control" name="fi" required>
  </div>
  <div class="form-group">
    <label for="ff">Fecha Final</label>
    <input type="date" class="form-control" name="ff" required>
  </div>
  <input type="hidden" name="id" value=2>
  <button type="submit" class="btn btn-default">Buscar</button>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>