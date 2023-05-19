<?php

		//extract($_POST);
		include 'conexion.php';

		if(extract($_GET)){
			$idActividad = $_GET['idActividad'];
			$contador = $_GET['alumnosCant'];

			//sentencia SQL para ingresar datos nuevos a la base de datos
			$sql="UPDATE oferta SET contador='$contador' WHERE idActividad='$idActividad'";
			$sql2="DELETE FROM detalleoferta WHERE idActividad='$idActividad'";

			if((mysqli_query($conexion, $sql)) && (mysqli_query($conexion, $sql2))){
				echo "<center> Oferta Reactivada </center>";
			} else{
				echo "<center> Ha ocurrido un problema y no se ha podido modificar la nueva oferta.";
			}
		}

		
	?>
<br>
<a href="listaOfertasDisponibles.php">Regresar</a>