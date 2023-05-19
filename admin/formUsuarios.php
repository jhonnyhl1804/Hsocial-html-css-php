<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Crear Usuarios</title> <!-- titulo que aparecerá en la pestaña-->
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
		</table>
	</td>

	<!-- FIN DE LA COLUMNA DE OPCIONES -->
	
	<!--=====================================
	COLUMNA CON TABLA DE CONTENIDO
	======================================-->
	
	<td width="100%"> <!-- tamaño horizontal de la columna-->
	
		<center> 
			<table bgcolor="#D7D0D0" width="250px" border="1px" bordercolor="#030A9D">
				<tr>
					<td><a href="crearAdmin.php" style="text-decoration:none"> CREAR ADMINISTRADOR </a></td>
				</tr>
				<tr>
					<td><a href="crearProfesor.php" style="text-decoration:none">CREAR PROFESOR</a></td>
				</tr>
				<tr>
					<td><a href="crearAlumno.php" style="text-decoration:none">CREAR ALUMNO</a></td>
				</tr>
				<tr>
					<td><a href="crearUsuario.php" style="text-decoration:none">CREAR USUARIO</a></td>
				</tr>
			</table>
		</center>



	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>