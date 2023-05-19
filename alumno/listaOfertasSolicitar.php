<?php
	session_start();

	//extract($_POST);
	include '../conexion.php';
	$rs=mysqli_query($conexion, "SELECT MAX(idDetalle) AS idDetalle FROM detalleoferta");
	if ($row = mysqli_fetch_array($rs)) {
		$idDetalle = trim($row[0]+1);

		if(extract($_GET)){
			$idActividad = $_GET['idActividad'];
			$contador = $_GET['contador']-1;
			$idAlumno = $_SESSION['id'];
			$realizado = 0;

			//sentencia SQL para ingresar datos nuevos a la base de datos
			$sql="UPDATE oferta SET contador='$contador' WHERE idActividad='$idActividad'";
			$sql2="INSERT INTO detalleoferta (idDetalle,idAlumno,idActividad,realizado) VALUES ('$idDetalle','$idAlumno','$idActividad','$realizado')";


			if( ( mysqli_query($conexion, $sql) ) && ( mysqli_query($conexion, $sql2) ) ){
				echo "<center> Oferta Solicitada</center>";
			} else{
				echo "<center> Ha ocurrido un problema y no se ha podido modificar la nueva oferta.";
			}
		}
	}
		
	?>
<br>
<a href="listaOfertas.php">Regresar</a>