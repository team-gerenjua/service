<?php

include "conexion.php";

/*$sql1= "select * from clientes where nombre like '%$_GET[s]%' or apellido like '%$_GET[s]%' or dni like '%$_GET[s]%' or telefono like '%$_GET[s]%' ";
$query = $con->query($sql1);*/
if($_GET['opt']!=""){
	$opt=$_GET['opt'];
	$s=$_GET['s'];
	$sql1= "select cod_interno,falla,observaciones,fecha,estado,modelo,nombre,nombre_part from pedidos p,clientes c, equipos e, vendedores v where e.id_equipo=p.id_equipo and c.dni=p.dni and v.id_part=p.id_part and $opt like '$s' ";
	$query = $con->query($sql1);
}else{
	print "<script>alert(\"Selecciona una categoria.\");window.location='index.php';</script>";
}

?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Equipo</th>
	<th>Cliente</th>
	<th>Fallo</th>
	<th>Observaciones</th>
	<th>Vendedor</th>
	<th>Fecha</th>
	<th>Estado</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):
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
