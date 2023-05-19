<?php

		//extract($_POST);
		include 'conexion.php';

		if(extract($_GET)){
			$idActividad = $_GET['idActividad'];
			$contador = -2;
			$realizado = 0;
			$idAlumno = 0;

			//sentencia SQL para ingresar datos nuevos a la base de datos
			$sql="UPDATE oferta SET contador='$contador' WHERE idActividad='$idActividad'";

			$sql2="SELECT * FROM detalleoferta WHERE idActividad='$idActividad'";
			$resultado = mysqli_query($conexion, $sql2);

			if(mysqli_num_rows($resultado)==0){
				$sql3="INSERT INTO detalleoferta (idAlumno, idActividad, realizado) VALUES ('$idAlumno','$idActividad','$realizado') ";

				if((mysqli_query($conexion, $sql))&&(mysqli_query($conexion, $sql3))){
					echo "<center> Oferta Cancelada </center>";
				} 
				else{
					echo "<center> Ha ocurrido un problema y no se ha podido cancelar la oferta.";
				}
			}
			else{
				$sql3="UPDATE detalleoferta SET idAlumno='$idAlumno' WHERE idActividad='$idActividad' ";

				if((mysqli_query($conexion, $sql))&&(mysqli_query($conexion, $sql3))){
					echo "<center> Oferta Cancelada </center>";
				} 
				else{
					echo "<center> Ha ocurrido un problema y no se ha podido cancelar la oferta.";
				}
			}

			
		}

		
	?>
<br>
<a href="listaOfertasDisponibles.php">Regresar</a>