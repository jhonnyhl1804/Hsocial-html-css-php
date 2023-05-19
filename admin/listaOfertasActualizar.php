<?php

		//extract($_POST);
		include '../conexion.php';

		if(extract($_POST)){
			$idActividad = $_POST['idActividad'];
			$tipoActividad = $_POST['tipoActividad'];
			$nombreActividad = $_POST['nombreActividad'];
			$descripcion = $_POST['descripcion'];
			$horasCant = $_POST['horasCant'];
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
			$lugar = $_POST['lugar'];
			$alumnosCant = $_POST['alumnosCant'];
			$contador = $_POST['alumnosCant'];

			//sentencia SQL para ingresar datos nuevos a la base de datos
			$sql="UPDATE oferta SET tipoActividad='$tipoActividad', nombreActividad='$nombreActividad', descripcion='$descripcion', horasCant='$horasCant', fecha='$fecha', hora='$hora', lugar='$lugar', alumnosCant='$alumnosCant', contador='$contador' WHERE idActividad='$idActividad'";

			if(mysqli_query($conexion, $sql)){
				echo "<center> Los datos han sido actualizados correctamente. <br> Oferta Modificada</center>";
			} else{
				echo "<center> Ha ocurrido un problema y no se ha podido modificar la nueva oferta.";
			}
		}

		
	?>
<br>
<a href="listaOfertas.php">Regresar</a>