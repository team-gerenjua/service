<?php

if(!empty($_POST)){
	if(isset($_POST["falla"]) &&isset($_POST["obs"]) &&isset($_POST["estado"]) &&isset($_POST["id"])){
		if($_POST["estado"]!=""&& $_POST["obs"]!=""){
			include "conexion.php";
			$sql = "update pedidos set observaciones=\"$_POST[obs]\",falla=\"$_POST[falla]\",estado=\"$_POST[estado]\" where cod_interno=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../index.php';</script>";

			}
		}
	}
}



?>