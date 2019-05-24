<?php
if(!empty($_POST)){
	if(isset($_POST['modelo']) &&isset($_POST['cod'])){
		if($_POST['modelo']!=""&& $_POST['cod']!=""){
			include "conexion.php";
			$sql = "insert into equipos(modelo,cod_serie) value (\"$_POST[modelo]\",\"$_POST[cod]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../equipos.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../equipos.php';</script>";

			}

		}
	}
}
?>