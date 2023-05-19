<?php
    session_start(); //codigo para iniciar sesion
    //session_destroy(); //codigo para destruir la sesion
    include '../conexion.php';  //esto es para conectar con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">  <!-- Esto permite que se puedan escribir letras como la Ñ-->
	<title>Login</title> <!-- titulo que aparecerá en la pestaña-->
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
					<a href="listaOfertas.php" style="text-decoration:none"> <font color="white"> <h2>Ver Ofertas</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="solicitudes.php" style="text-decoration:none"> <font color="white"> <h2>Mis Solicitudes</h2> </font></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="informes.php" style="text-decoration:none"> <font color="white"> <h2>Informes</h2></font> </a>
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
	
		<!--======================
		=          LISTA DE SOLICITUDES              =
		=======================-->
	
		<a href="imprimir.php"><input type="button" value="Imprimir"></a>
		<table bgcolor="#EAECF7" border="1px">
			<tr bgcolor="#D8CBF8">
				<!--<th>ID</th> -->

				<th>TIPO ACTIVIDAD</th>
				<th>NOMBRE ACTIVIDAD</th>
				<th>DESCRIPCION</th>
				<th>HORAS</th>				
				<th>FECHA</th>
				<th>LUGAR</th>
				<th>NOMBRE PROFESOR</th>
			</tr>

			<?php

				$sql="SELECT * FROM detalleoferta INNER JOIN oferta ON detalleoferta.idActividad = oferta.idActividad INNER JOIN profesor ON oferta.idProfesor = profesor.idProfesor WHERE idAlumno='$_SESSION[id]' AND detalleoferta.realizado = 1"; //seleccionar todo lo que hay en "oferta" en base de datos
				$resultado = mysqli_query($conexion, $sql); //se guardan todos los resultados encontrados

				if(mysqli_num_rows($resultado)==0){
					echo '<tr><td colspan="11"> NO HAY RESULTADOS </td></tr>';
				}
				$i=0;
				$horas=0;
				while($datos=mysqli_fetch_array($resultado)){ //Ciclo While
					$i=$i+1;
					//lo siguiente se repite hasta que se hayan mostrado todos los resultados

			?>

			<tr>
				<!--  se muestran los datos correspondientes a las columnas  -->
				<!--<td>	<?php //echo $datos['id'] ?>						</td> -->
				<td>	<?php echo $datos['tipoActividad'] ?>			</td>
				<td>	<?php echo $datos['nombreActividad'] ?>			</td>
				<td>	<?php echo $datos['descripcion'] ?>				</td>
				<td>	<center><?php echo $datos['horasCant']; ?></center>	</td>
				<td>	<?php echo $datos['fecha'] ?>					</td>
				<td>	<?php echo $datos['lugar'] ?>					</td>
				<td>	<?php echo $datos['nombre'],' ',$datos['apellido'] ?></td>
				
			</tr>
			<?php
				$horas = $horas + $datos['horasCant'];
				} //fin del ciclo While
			?>
			<tr>
				<td colspan="3"> <p style="text-align: right; padding-right: 10px; padding-top: 0;">Total de horas:</p>  </td> <td><center><?php echo $horas ?></center></td><td colspan="3"></td>
			</tr>
		</table>
<!--====  Fin Lista de ofertas  ====-->
</table>
	</td>
	<!--====  FIN DE COLUMNA DE CONTENIDO  ====-->
	</tr>
</table>
<!--====  FIN DE LA TABLA DEL CUERPO  ====-->
</body>
</html>