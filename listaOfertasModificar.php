<?php
    session_start(); //codigo para iniciar sesion
    
    include 'conexion.php';  //esto es para conectar con la base de datos


	$id=$_GET['idActividad'];

	$sql="SELECT * FROM oferta WHERE idActividad='$id'";
	$resultado= mysqli_query($conexion, $sql);
	$datos=mysqli_fetch_array($resultado);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Nueva actividad Social</title> <!-- titulo que aparecerá en la pestaña-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>


<!--=====================================
TABLA DEL CUERPO CON DOS COLUMNAS DONDE LA PRIMERA TENDRÁ LA BARRA DE OPCIONES Y LA SEGUNDA COLUMNA EL CONTENIDO
======================================-->



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
	<form method="POST" action="listaOfertasActualizar.php"> <!-- los datos se envian a esta misma pagina -->
		<table border="1"> <!-- una tabla para ponerle borde -->
			<tr><td>
				<table >	<!-- tabla para encerrar el formulario -->
					<tr bgcolor="green">
					<td colspan="2"> <!-- cospan hará que el td ocupe dos columnas -->
						<center><h2> .:Editar Actividad:. </h2></center>
					</td>
					</tr>
					<tr>
						<td>
							<h3> Tipo de actividad: </h3>
						</td>
						<td>
							<select style="width:196px" name="tipoActividad"> <!--Lista de opciones-->
								<option value="<?php echo $datos['tipoActividad'] ?>"></option>
								<option value="aseo">Aseo</option>
								<option value="disciplina">Disciplina</option>
								<option value="coordinacion">Coordinación</option>
								<option value="secretaria">Secretaría</option>
								<option value="psicorientacion">Psicorientación</option>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<h3> Nombre de actividad: </h3> <!-- etiqueta -->
						</td>
						<td>
							<input type="text" value="<?php echo $datos['nombreActividad'] ?>" size="25" name="nombreActividad"> <!--campo donde se escribe -->
						</td>
					</tr>
					<tr>
						<td>
							<h3> Descripción: </h3>
						</td>
						<td>
							<textarea  name="descripcion" cols="22" value="<?php echo $datos['descripcion'] ?>"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<h3> Número de horas: </h3>
						</td>
						<td>
							<input type="number" style="width:190px" name="horasCant" value="<?php echo $datos['horasCant'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Fecha: </h3>
						</td>
						<td>
							<input type="date" name="fecha" style="width:190px" value="<?php echo $datos['fecha'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Hora: </h3>
						</td>
						<td>
							<input type="time" name="hora" style="width:190px" value="<?php echo $datos['hora'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Lugar: </h3>
						</td>
						<td>
							<input type="text" name="lugar" size="25" value="<?php echo $datos['lugar'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h3> Cantidad de Alumnos: </h3>
						</td>
						<td>
							<input type="text" name="alumnosCant" size="25" value="<?php echo $datos['alumnosCant'] ?>">
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<input type="hidden" value="<?php echo $datos['idActividad'] ?>" name="idActividad">
							<center><input type="submit" name="modificar" style="font-size: 19px" value="Modificar"></center>
						</td>
					</tr>		
				</table>

			</td></tr>
		</table>
	</form>	
	<?php

		?>
	</center>
	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>