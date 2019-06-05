<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM vendedores WHERE id_part=".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../vendedores.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../vendedores.php';</script>";

			}
}

?>