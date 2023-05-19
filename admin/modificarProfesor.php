<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Editar Profesor</title> <!-- titulo que aparecerá en la pestaña-->
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
			<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
			
		</table>
	</td>

	<!-- FIN DE LA COLUMNA DE OPCIONES -->
	
	<!--=====================================
	COLUMNA CON TABLA DE CONTENIDO
	======================================-->
	<?php 
		$idProfesor=$_GET['idProfesor'];
		$sql = "SELECT * FROM profesor WHERE idProfesor = '$idProfesor'";
		$resultado = mysqli_query($conexion, $sql);
		$datos=mysqli_fetch_array($resultado);
			
	?>
	
	<td width="100%"> <!-- tamaño horizontal de la columna-->
	
<center>
	<form method="POST" action="actualizarProfesor.php"> <!-- metodo con el que se enviarán los datos -->
		<table border="1"> <!-- una tabla para ponerle borde -->
			<tr>
				<td>
					<table >	<!-- tabla para encerrar el formulario -->
						<tr bgcolor="green">
							<td colspan="2"> <!-- cospan hará que el td ocupe dos columnas -->
								<center> <h2> .:Modificar Estudiante:. </h2> </center>
							</td>
						</tr>
						<tr>
							<td>
								<h3> Nombre: </h3> <!-- etiqueta -->
							</td>
							<td>
								<input type="text" name="nombre" value="<?php echo $datos['nombre'] ?>" size="25"> <!--campo donde se escribe -->
							</td>	
						</tr>
						<tr>
							<td>
								<h3> Apellido: </h3>
							</td>
							<td>
								<input type="text" name="apellido" value="<?php echo $datos['apellido'] ?>" size="25">
							</td>
						</tr>
						<tr>
							<td>
								<h3> Cédula: </h3>
							</td>
							<td>
								<input type="text" name="cedula" size="25" value="<?php echo $datos['idProfesor'] ?>" readonly>
							</td>
						</tr>

						<tr>
							<td>
								<h3> Correo Electrónico: </h3>
							</td>
							<td>
								<input type="email" name="correo" size="25" value="<?php echo $datos['correo'] ?>" required>
							</td>
						</tr>
						<tr>
							<td>
								<h3> Género: </h3>
							</td>
							<td>
								<input type="radio" name="genero" value="Masculino"> Masculino
								<br> <!-- para brincar al otro renglon -->
								<input type="radio" name="genero" value="Femenino"> Femenino
								<br>
								<input type="radio" name="genero" value="Otro"> Otros
							</td>
						</tr>
						<tr>
							<td>
								<h3> Lugar de Nacimiento: </h3>
							</td>
							<td>
								<input type="text" name="lugarNac" size="25" value="<?php echo $datos['lugarNac'] ?>">
							</td>
						</tr>
						<tr>
							<td>
								<h3> Fecha de Nacimiento </h3>
							</td>
							<td>
								<input type="date" name="fechaNac" style="width:180px" value="<?php echo $datos['fechaNac'] ?>">
							</td>
						</tr>
						<tr>
							<td>
								<h3> Teléfono: </h3>
							</td>
							<td>
								<input type="text" name="telefono" size="25" value="<?php echo $datos['telefono'] ?>">
							</td>
						</tr>
						<tr>
							<td>
								<h3> Dirección: </h3>
							</td>
							<td>
								<input type="text" name="direccion" size="25" value="<?php echo $datos['direccion'] ?>">
							</td>
						</tr>
						<tr>
							<td>
								<h3> Licenciatura: </h3>
							</td>
							<td>
								<input type="text" name="licenciatura" size="25" value="<?php echo $datos['licenciatura'] ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><input type="submit" style="font-size: 19px" value="Modificar"></center>
							</td>
						</tr>
					</table>
				</td>
			</tr>
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