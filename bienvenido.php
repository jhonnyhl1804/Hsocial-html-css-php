<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include 'conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Login</title> <!-- titulo que aparecerá en la pestaña-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
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
					<a href="actsocial.php" style="text-decoration:none"> <font color="white">  <h2>Crear Oferta</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertasDisponibles.php" style="text-decoration:none"> <font color="white"> <h2>Ofertas Disponibles</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertasCerradas.php" style="text-decoration:none"> <font color="white"> <h2>Ofertas Cerradas</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="listaOfertas.php" style="text-decoration:none"> <font color="white"> <h2>Todas Mis Ofertas</h2></font> </a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="index.php" style="text-decoration:none"> <font color="#E0DBDB"> <h3>Cerrar Sesión</h3></font> </a>
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
			<h3> 
				<font style="text-transform:uppercase"> 
					BIENVENIDO PROFESOR <font color="blue"><?php echo $_SESSION['nombre'],' '; echo $_SESSION['apellido'] ?></font>, SU ID ES: <?php echo $_SESSION['id'] ?>
				</font> 
			</h3> 
		</center>



	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>