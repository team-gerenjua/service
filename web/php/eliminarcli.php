<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM clientes WHERE dni=".$_GET["dni"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../clientes.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../clientes.php';</script>";

			}
}

?>