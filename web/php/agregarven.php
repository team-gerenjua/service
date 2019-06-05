<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["telefono"]) &&isset($_POST["correo"]) ){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["telefono"]!=""){
			include "conexion.php";

			$sql = "insert into vendedores(nombre_part,ape_part,telefono_part,correo_part) value (\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[telefono]\",\"$_POST[correo]\")";
			$query = $con->query($sql);

			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../vendedores.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../vendedores.php';</script>";

			}
		}
	}
}



?>