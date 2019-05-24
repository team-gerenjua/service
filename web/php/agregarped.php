<?php

if(!empty($_POST)){
	if(isset($_POST["equipo"]) &&isset($_POST["dni"]) &&isset($_POST["falla"]) &&isset($_POST["obs"]) &&isset($_POST["vendedor"]) ){
		if($_POST["equipo"]!=""&& $_POST["dni"]!=""&&$_POST["vendedor"]!=""){
			include "conexion.php";
			$date = date("Y-m-d");
			$sql = "insert into pedidos(id_equipo,dni,observaciones,falla,id_part,fecha,estado) value (\"$_POST[equipo]\",\"$_POST[dni]\",\"$_POST[obs]\",\"$_POST[falla]\",\"$_POST[vendedor]\",\"$date\",'en reparacion')";
			$query = $con->query($sql);

			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../index.php';</script>";

			}
		}
	}
}



?>