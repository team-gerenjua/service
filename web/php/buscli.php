<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from clientes where nombre like '%$_GET[s]%' or apellido like '%$_GET[s]%' or dni like '%$_GET[s]%' or telefono like '%$_GET[s]%'";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Dni</th>
	<th>Telefono</th>
	<th>Alta</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):
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
<?php endif;?>
