<?php
include "php/conexion.php";
$user_id=null;
$fi = $_GET['fi'];
$ff = $_GET['ff'];
if($_GET['id']==1){
$sql1= "select cod_interno,falla,observaciones,fecha,estado,modelo,nombre,nombre_part from pedidos p,clientes c, equipos e, vendedores v where e.id_equipo=p.id_equipo and c.dni=p.dni and v.id_part=p.id_part and fecha between '$fi' and '$ff'";
$query1 = $con->query($sql1);

}
if($_GET['id']==2){
	$sql2= "select * from clientes where alta between '$fi' and '$ff'";
$query2 = $con->query($sql2);
	
}

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
<div class="col-md-12">
		<h2>Busqueda por Fecha</h2>
<?php
	
//TABLA PEDIDOS
	
	if($_GET['id']==1){
	if($query1->num_rows>0):?>
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
<?php while ($r=$query1->fetch_array()):
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
				window.location="php/delpedido.php?id="+<?php echo $r["cod_interno"];?>;

			}

		});
		</script>
  </td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;
	}

//TABLA CLIENTES	
	
	if($_GET['id']==2){
		if($query2->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Dni</th>
	<th>Telefono</th>
	<th>Alta</th>
	<th></th>
</thead>
<?php while ($r=$query2->fetch_array()):
	$phpdate = strtotime( $r["alta"] );
	$fecha = date( 'd/m/Y', $phpdate );
	?>
<tr>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["apellido"]; ?></td>
	<td><?php echo $r["dni"]; ?></td>
	<td><?php echo $r["telefono"]; ?></td>
	<td><?php echo $fecha; ?></td>
	<td style="width:190px;">
		<a href="php/editarcli.php?dni=<?php echo $r["dni"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["dni"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["dni"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminarcli.php?dni="+<?php echo $r["dni"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;
	}
?>
	</div>
	</div>
	</div>
<br>
<br>

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>