<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Crear Profesor</title> <!-- titulo que aparecerá en la pestaña-->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
<table id="main"> 
	<tr><td>

		<!--=====================================
		COLUMNA CON TABLA QUE CONTIENE LA BARRA DE OPCIONES
		======================================-->	
		
		<div id="superior"> ¡Hola! <?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?> </div>
		<table id="lateral" bgcolor="#007EFF" width="250px" border="1px" bordercolor="#030A9D">
			<tr >
				<td height="300px">
					<center><h1>MENÚ</h1></center>

				</td>
			</tr>
			<tr>
				<td>
					<a href="formUsuarios.php" style="text-decoration:none"> <font color="white">  <h2>Crear Usuario</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaUsuarios.php" style="text-decoration:none"> <font color="white"> <h2>Lista de Usuarios</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertas.php" style="text-decoration:none"> <font color="white"> <h2>Lista de Ofertas</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="../index.php" style="text-decoration:none"> <font color="#E0DBDB"> <h3>Cerrar Sesión</h3></font> </a>
				</td>
			</tr>
			<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
			
		</table>
	</td>

	<!-- FIN DE LA COLUMNA DE OPCIONES -->

	<?php

	//codigo para obtener el último de valor maximo en el id de los usuarios
	//$rs=mysqli_query($conexion, "SELECT MAX(idProfesor) AS idProfesor FROM profesor");
	//if ($row = mysqli_fetch_array($rs)) {
	//	$idProfesor = trim($row[0]+1); //al proximo id se le sumará un número
	
	
		//se ingresan los datos

		if(isset($_POST['crear'])){
			//$id = 'id';		
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo = $_POST['correo'];
			$cedula = $_POST['cedula'];
			$genero = $_POST['genero'];
			$lugarNac = $_POST['nacionalidad'];
			$fechaNac = $_POST['fechanac'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$licenciatura = $_POST['licenciatura'];

			//sentencia SQL para ingresar datos nuevos a la base de datos
			$sql="INSERT INTO profesor (idProfesor, nombre, apellido, correo, genero, lugarNac, fechaNac, telefono, direccion, licenciatura) VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$genero', '$lugarNac', '$fechaNac', '$telefono', '$direccion', '$licenciatura')";

			if(mysqli_query($conexion, $sql)){
				echo "<center> Los datos han sido ingresados correctamente. <br> Usuario Creado</center>";
			} else{
				echo "<center> Ha ocurrido un problema y no se ha podido crear nuevo usuario.";
			}
		}
	//}
		
	?>
	
	<!--=====================================
	COLUMNA CON TABLA DE CONTENIDO
	======================================-->


	<?php

		
?>			
	
	<td width="100%"> <!-- tamaño horizontal de la columna-->
	
<center>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- metodo con el que se enviarán los datos -->
		<table border="1"> <!-- una tabla para ponerle borde -->
			<tr><td>
				<table >	<!-- tabla para encerrar el formulario -->
					<tr bgcolor="green">
						<td colspan="2"> <!-- cospan hará que el td ocupe dos columnas -->
							<center> <h2> .:Agregar Profesor:. </h2> </center>
						</td>
					</tr>
					<tr>
						<td>
							<h3> Nombre: </h3> <!-- etiqueta -->
						</td>
						<td>
							<input type="text" name="nombre" size="25"> <!--campo donde se escribe -->
						</td>	
					</tr>
					<tr>
						<td>
							<h3> Apellido: </h3>
						</td>
						<td>
							<input type="text" name="apellido" size="25">
						</td>
					</tr>					
					<tr>
						<td>
							<h3> Correo Electrónico: </h3>
						</td>
						<td>
							<input type="email" name="correo" size="25" required>
						</td>
					</tr>
					<tr>
						<td>
							<h3> Cédula de Ciudadanía: </h3>
						</td>
						<td>
							<input type="text" name="cedula" size="25">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Género: </h3>
						</td>
						<td>
							<input type="radio" name="genero" value="masculino"> Masculino
							<br> <!-- para brincar al otro renglon -->
							<input type="radio" name="genero" value="femenino"> Femenino
							<br>
							<input type="radio" name="genero" value="otros"> Otros
						</td>
					</tr>
					<tr>
						<td>
							<h3> Lugar de Nacimiento: </h3>
						</td>
						<td>
							<input type="text" name="nacionalidad" size="25">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Fecha de Nacimiento </h3>
						</td>
						<td>
							<input type="date" name="fechanac" style="width:180px">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Teléfono: </h3>
						</td>
						<td>
							<input type="text" name="telefono" size="25">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Dirección: </h3>
						</td>
						<td>
							<input type="text" name="direccion" size="25">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Licenciatura: </h3>
						</td>
						<td>
							<input type="text" name="licenciatura" size="25">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<center><input type="submit" name="crear" style="font-size: 19px" value="Crear"></center>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>
	</form>	
</center>
	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>