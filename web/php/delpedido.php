<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM pedidos WHERE cod_interno=".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../index.php';</script>";

			}
}

?>