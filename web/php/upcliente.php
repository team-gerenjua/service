<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["dni"]) &&isset($_POST["telefono"]) &&isset($_POST["viejodni"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["dni"]!=""){
			include "conexion.php";
			$sql = "update clientes set nombre=\"$_POST[nombre]\",apellido=\"$_POST[apellido]\",dni=\"$_POST[dni]\",telefono=\"$_POST[telefono]\"where dni=".$_POST["viejodni"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../clientes.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../clientes.php';</script>";

			}
		}
	}
}



?>