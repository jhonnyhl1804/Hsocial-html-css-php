<?php

		//extract($_POST);
		include '../conexion.php';

		if(extract($_POST)){
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$cedula = $_POST['cedula'];
			$correo = $_POST['correo'];
			$genero = $_POST['genero'];
			$lugarNac = $_POST['lugarNac'];
			$fechaNac = $_POST['fechaNac'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$licenciatura = $_POST['licenciatura'];

			//sentencia SQL para ingresar datos nuevos a la base de datos
			$sql="UPDATE profesor SET nombre='$nombre', apellido='$apellido', correo='$correo', genero='$genero', lugarNac='$lugarNac', fechaNac='$fechaNac', telefono='$telefono', direccion='$direccion', licenciatura='$licenciatura' WHERE idProfesor='$cedula'";

			if(mysqli_query($conexion, $sql)){
				echo "<center> Los datos han sido actualizados correctamente. </center>";
			} else{
				echo "<center> Ha ocurrido un problema y no se ha podido modificar la nueva oferta.";
			}
		}

		
	?>
<br>
<a href="listaUsuarios.php">Regresar</a>