<?php
	session_start();
	//extract($_POST);
	include '../conexion.php';

	if(extract($_GET)){
		$idDetalle = $_GET['idDetalle'];
		$idActividad = $_GET['idActividad'];
		$contador = $_GET['contador']+1;
		$idAlumno = $_SESSION['id'];

		//sentencia SQL para ingresar datos nuevos a la base de datos
		$sql="UPDATE oferta SET contador='$contador' WHERE idActividad='$idActividad'";
		$sql2="DELETE FROM detalleoferta WHERE idDetalle='$idDetalle'";


		if( ( mysqli_query($conexion, $sql) ) && ( mysqli_query($conexion, $sql2) ) ){
			echo "<center> Oferta Cancelada</center>";
		} else{
			echo "<center> Ha ocurrido un problema y no se ha podido Cancelar la oferta.";
		}
	}

	
?>
<br>
<a href="solicitudes.php">Regresar</a>