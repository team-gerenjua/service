<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM equipos WHERE id_equipo=".$_GET['id'];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../equipos.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../equipos.php';</script>";

			}
}

?>