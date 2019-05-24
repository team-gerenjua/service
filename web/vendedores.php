<html>
	<head>
		<title>Service</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<?php 
  include "php/conexion.php";
  include "php/navbar.php";
  ?>
<body style="background-color:#FFFFFF;">
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Lista de Vendedores</h2>
<a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar Vendedor</a>
<br> <br>
<?php 
$user_id=null;
$sql1= "select * from vendedores where id_part!=0";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Telefono</th>
  <th>Correo</th>
  <th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
  <td><?php echo $r["nombre_part"]; ?></td>
  <td><?php echo $r["ape_part"]; ?></td>
  <td><?php echo $r["telefono_part"]; ?></td>
  <td><?php echo $r["correo_part"]; ?></td>
  <td style="width:190px;">
	  <a href="php/editarven.php?id=<?php echo $r["id_part"];?>" class="btn btn-sm btn-warning">Editar</a>
  	  <a href="#" id="del-<?php echo $r["id_part"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id_part"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/delvendedor.php?id="+<?php echo $r["id_part"];?>;

			}

		});
		</script>
  </td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
</div>
</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Vendedor</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" action="php/agregarven.php">
  <div class="form-group">
    <label for="descrip">Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="descrip">Apellido</label>
    <input type="text" class="form-control" name="apellido" required>
  </div>
  <div class="form-group">
    <label for="descrip">Telefono</label>
    <input type="text" class="form-control" name="telefono" required>
  </div>
  <div class="form-group">
    <label for="descrip">Correo</label>
    <input type="email" class="form-control" name="correo" required>
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