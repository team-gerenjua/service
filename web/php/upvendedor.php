<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["telefono"]) &&isset($_POST["correo"]) &&isset($_POST["id"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["telefono"]!=""){
			include "conexion.php";
			$sql = "update vendedores set nombre_part=\"$_POST[nombre]\",ape_part=\"$_POST[apellido]\",telefono_part=\"$_POST[telefono]\",correo_part=\"$_POST[correo]\"where id_part=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../vendedores.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../vendedores.php';</script>";

			}
		}
	}
}



?>