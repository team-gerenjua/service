
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
		<h2>Lista de Pedidos</h2>
<a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar Pedido</a>
	<form class="navbar-form navbar-right" role="search" action="buscar.php">
     <a data-toggle="modal" href="#fecha" class="btn btn-default">Buscar por Fecha</a>
     <select class="form-control" style="width: 150px" name="opt" required >
     <option disabled selected>Categoria</option>
     <option value="modelo">Equipo</option>
     <option value="nombre">Cliente</option>
     <option value="nombre_part">Vendedor</option>
     <option value="estado">Estado</option>
    </select>
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar por Categoria">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
	</form>
<br> <br>
<?php 
$user_id=null;
$sqlpedido= "select cod_interno,falla,observaciones,fecha,estado,modelo,nombre,nombre_part from pedidos p,clientes c, equipos e, vendedores v where e.id_equipo=p.id_equipo and c.dni=p.dni and v.id_part=p.id_part";
$querypedido = $con->query($sqlpedido);
	//$sql1= "select * from clientes where dni = ".$_GET["dni"];

?>

<?php if($querypedido->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
  <th>Equipo</th>
  <th>Cliente</th>
  <th>Falla</th>
  <th>Observaciones</th>
  <th>Vendedor</th>
  <th>Fecha de Carga</th>
  <th>Estado</th>
  <th></th>
</thead>
<?php while ($r=$querypedido->fetch_array()):
/*	$sqlcliente= "select nombre from clientes where dni = ".$r["dni"];
	$querycliente = $con->query($sqlcliente);
	$sqlequipo= "select modelo from equipos where id_equipo = ".$r["id_equipo"];
	$queryequipo = $con->query($sqlequipo);
	$sqlvendedor= "select nombre_part from vendedores where id_part = ".$r["id_part"];
	$queryvendedor = $con->query($sqlvendedor);*/
	$phpdate = strtotime( $r["fecha"] );
	$fecha = date( 'd/m/Y', $phpdate );
?>
<tr>
  <td><?php echo $r["modelo"]; ?></td>
  <td><?php echo $r["nombre"]; ?></td>
  <td><?php echo $r["falla"]; ?></td>
  <td><?php echo $r["observaciones"]; ?></td>
  <td><?php echo $r["nombre_part"]; ?></td>
  <td><?php echo $fecha; ?></td>
  <td><?php echo $r["estado"]; ?></td>
  <td style="width:190px;">
	  <a href="php/editarped.php?id=<?php echo $r["cod_interno"];?>" class="btn btn-sm btn-warning">Editar</a> 
  	  <a href="#" id="del-<?php echo $r["cod_interno"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["cod_interno"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/delpedido.php?id="+<?php echo $r["cod_interno"];?>;

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
          <h4 class="modal-title">Agregar Pedido</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" action="php/agregarped.php">
  <div class="form-group">
    <label for="descrip">Equipo</label>
    <select class="form-control" name="equipo" required>
    <?php 
    	$sql1= "select * from equipos";
		$query1 = $con->query($sql1);
		if($query1->num_rows>0):
			while ($r1=$query1->fetch_array()):
				echo '<option value="'.$r1['id_equipo'].'">'.$r1['modelo'].'</option>';
			endwhile;
		endif;?>
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="descrip">Dni de Cliente</label>
    <input type="text" class="form-control" name="dni" required>
  </div>
  <div class="form-group">
    <label for="descrip">Falla</label>
    <input type="text" class="form-control" name="falla" required>
  </div>
  <div class="form-group">
    <label for="descrip">Observaciones</label>
    <input type="text" class="form-control" name="obs" required>
  </div>
  <div class="form-group">
    <label for="descrip">Vendedor/Proovedor de Partes</label>
    <select class="form-control" name="vendedor" required>
    <?php 
    	$sql2= "select * from vendedores";
		$query2 = $con->query($sql2);
		if($query2->num_rows>0):
			while ($r2=$query2->fetch_array()):
				echo '<option value="'.$r2['id_part'].'">'.$r2['nombre_part'].'</option>';
			endwhile;
		endif;?>
    ?>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Agregar</button>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
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
  <input type="hidden" name="id" value=1>
  <button type="submit" class="btn btn-default">Buscar</button>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>