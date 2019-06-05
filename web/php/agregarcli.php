<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["dni"]) &&isset($_POST["telefono"]) ){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["dni"]!=""){
			include "conexion.php";
			$alta = date("Y-m-d");
			$sql = "insert into clientes(nombre,apellido,dni,telefono,alta) value (\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[dni]\",\"$_POST[telefono]\",\"$alta\")";
			$query = $con->query($sql);



//verificar si agrega valor para mostrar diferente mensaje...
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../clientes.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../clientes.php';</script>";

			}



		}
	}
}



?>